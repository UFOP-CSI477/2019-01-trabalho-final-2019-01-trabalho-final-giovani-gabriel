<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Session;
use App\Genre;
use App\Room;
use App\Film;

class FilmController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except'=>['emBreve','emCartaz','show']]);
    }

    public function index(){
        if(Auth::user()->type == 1){
            $films = Film::orderBy('title', 'asc')->get();
            $genres = Genre::all();
            return view('films.index')->with('films', $films)->with('genres', $genres);
        }
        else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }      
    }

    public function emBreve(){
        $films = Film::where('released', 0)->get();
        $genres = Genre::all();
        return view('films.emBreve')->with('films', $films)->with('genres', $genres);
    }

    public function emCartaz(){
        $films = Film::where('released', 1)->get();
        $genres = Genre::all();
        return view('films.emCartaz')->with('films', $films)->with('genres', $genres);
    }

    public function comprar(){
        $films = Film::where('released', 1)->orderBy('title', 'asc')->get();
        $genres = Genre::all();
        $sessions = Session::all();
        $rooms = Room::all();
        return view('films.buy')->with('films', $films)->with('genres', $genres)->with('sessions', $sessions)->with('rooms', $rooms);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->type == 1){
            $genres = Genre::orderBy('name', 'asc')->get();
            return view('films.create')->with('genres', $genres);
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
                'title' => 'required|max:255',
                'time' => 'required',
                'rating' => 'required',
                'casting' => 'required|max:255',
                'synopsis' => 'required|max:900',
                'photo' => 'required|max:255',
                'director' => 'required|max:255',
            ]);
            
            if ($validator->fails()) {
                session()->flash('mensagem', 'Dados inválidos');
                
                return redirect()->route('films.create');
            }

            Film::create($request->all());
            session()->flash('mensagem', 'filme inserido com sucesso!');
            return redirect()->route('films.index');
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
    public function show(Film $film)
    {
        $genres = Genre::all();
        $rooms = Room::all();
        $sessions = Session::orderBy('date', 'asc')->get();
        return view('films.show')->with('film',$film)->with('genres', $genres)->with('sessions', $sessions)->with('rooms', $rooms);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function edit(Film $film)
    {
        if(Auth::user()->type == 1){
            $genres = Genre::orderBy('name', 'asc')->get();
            return view('films.edit')->with('film',$film)->with('genres', $genres);
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
    public function update(Request $request, Film $film)
    {
        if(Auth::user()->type == 1){
            $validator = Validator::make($request->all(), [
                'title' => 'required|max:255',
                'time' => 'required',
                'rating' => 'required',
                'casting' => 'required|max:255',
                'synopsis' => 'required|max:900',
                'photo' => 'required|max:255',
                'director' => 'required|max:255',
            ]);
            
            if ($validator->fails()) {
                session()->flash('mensagem', 'Dados inválidos');
                return redirect()->route('films.edit', $film->id);
            }
            $film -> fill($request->all());
            $film->save();
            session()->flash('mensagem', 'filme atualizado com sucesso!');
            return redirect()->route('films.show',$film->id);
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
    public function destroy(Film $film)
    {
        if(Auth::user()->type == 1){
            $film->delete();
            session()->flash('mensagem', 'Filme excluido com sucesso!');
            return redirect()->route('films.index');
        }
        else{
            session()->flash('mensagem', 'Acesso restrito a administradores!');
            return redirect()->route('home');
        }
    }
}
