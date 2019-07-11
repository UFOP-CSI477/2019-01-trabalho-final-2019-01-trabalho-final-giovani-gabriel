<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Session;
use App\Room;
use App\Film;

class SessionController extends Controller
{

    public function __construct(){
        $this->middleware('auth', []);
    }

    public function index(){
        if(Auth::user()->type == 1){
            $sessions = Session::all();
            $films = Film::all();
            return view('sessions.index')->with('sessions', $sessions)->with('films', $films);
        }
        else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == 1){
            $films = Film::all();
            $rooms = Room::all();
            return view('sessions.create')->with('films', $films)->with('rooms', $rooms);
        }
        else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->type == 1){
            $validator = Validator::make($request->all(), [
                'room' => 'required',
                'film' => 'required|max:255',
                'price' => 'required',
                'dimensions' => 'required',
            ]);
            
            if ($validator->fails()) {
                session()->flash('mensagem', 'Dados inválidos');
                return redirect()->route('session.create');
            }
            Session::create($request->all());
            session()->flash('mensagem', 'sessão inserida com sucesso!');
            return redirect()->route('session.index');
        }
        else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        if(Auth::user()->type == 1){
            $films = Film::all();
    	   return view('sessions.show')->with('session',$session)->with('films', $films);
        }
        else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function edit(Session $session)
    {
        if(Auth::user()->type == 1){
            $films = Film::all();
            $rooms = Room::all();
            return view('sessions.edit')->with('session',$session)->with('films', $films)->with('rooms', $rooms);
        }
        else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Session $session)
    {
        if(Auth::user()->type == 1){
            $validator = Validator::make($request->all(), [
                'room' => 'required',
                'film' => 'required|max:255',
                'price' => 'required',
                'dimensions' => 'required',
            ]);
            
            if ($validator->fails()) {
                session()->flash('mensagem', 'Dados inválidos');
                return redirect()->route('session.edit', $session->id);
            }
            $session->fill($request->all());
            $session->save();
            session()->flash('mensagem', 'Sessão atualizada com sucesso!');
            return redirect()->route('session.show',$session->id);
        }
        else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function destroy(Session $session)
    {
		if(Auth::user()->type == 1){
            $session->delete();
            session()->flash('mensagem', 'Filme excluido com sucesso!');
            return redirect()->route('session.index');
        }
        else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }
    }
}
