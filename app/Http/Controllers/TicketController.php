<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Session;
use App\Ticket;
use App\Film;
use App\User;

class TicketController extends Controller
{

    public function __construct(){
        $this->middleware('auth', []);
    }

    public function index(){
        if(Auth::user()->type == 1){
            $sessions = Session::all();
            $tickets = Ticket::all();
            $films = Film::all();
            $users = User::all();
            return view('tickets.index')->with('tickets', $tickets)->with('sessions', $sessions)->with('users', $users)->with('films', $films);
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
            $sessions = Session::all();
            $users = User::all();
            $films = Film::all();
            return view('tickets.create')->with('sessions', $sessions)->with('users', $users)->with('films', $films);
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
        $validator = Validator::make($request->all(), [
            'session_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            session()->flash('mensagem', 'Dados inválidos');
            return redirect()->route('ticket.create');
        }
        Ticket::create($request->all());
        session()->flash('mensagem', 'Compra realizada com sucesso!');
        return redirect()->route('films.emCartaz');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {    
        if(Auth::user()->type == 1){
            $sessions = Session::all();
            $users = User::all();
            $films = Film::all();
            return view('tickets.show')->with('ticket',$ticket)->with('users', $users)->with('films', $films)->with('sessions', $sessions);
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
    public function edit(Ticket $ticket)
    {
        if(Auth::user()->type == 1){
            $sessions = Session::all();
            $users = User::all();
            $films = Film::all();
            return view('tickets.edit')->with('ticket',$ticket)->with('users', $users)->with('films', $films)->with('sessions', $sessions);
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
    public function update(Request $request, Ticket $ticket)
    {
        if(Auth::user()->type == 1){
            $validator = Validator::make($request->all(), [
            'session_id' => 'required',
            'user_id' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('mensagem', 'Dados inválidos');
                return redirect()->route('ticket.edit',$ticket->id);
            }
            $ticket->fill($request->all());
            $ticket->save();
            session()->flash('mensagem', 'Seção atualizado com sucesso!');
            return redirect()->route('ticket.show',$ticket->id);
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
    public function destroy(Ticket $ticket)
    {
        if(Auth::user()->type == 1){
          $ticket->delete();
          session()->flash('mensagem', 'Filme excluido com sucesso!');
          return redirect()->route('ticket.index');
      }
      else{
        session()->flash('mensagem', 'Acesso restrito a administradores!');
        return redirect()->route('home');
    }
}
}

