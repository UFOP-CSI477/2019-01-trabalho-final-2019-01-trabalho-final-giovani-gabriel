<?php

namespace App\Http\Controllers;

use App\User;
use App\Film;
use App\Ticket;
use App\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth', []);
    }

    public function index(){
        if(Auth::user()->type == 1){
            $users = User::all();
            return view('users.index') -> with('users', $users);
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
            return view('users.create');
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
    public function store(Request $request, User $user)
    {
        if(Auth::user()->type == 1){
            $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'cpf' => 'required|min:11|max:11',
            'password' => 'required|min:8|max:255',
            'type' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('mensagem', 'Dados inválidos');
                return redirect()->route('user.create');
            }
            $user->create($request->merge(['password' => Hash::make($request->get('password'))])->all());
            session()->flash('mensagem', 'Usuário inserido com sucesso!');
            return redirect()->route('user.index');
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
    public function show(User $user)
    {
        $sessions = Session::all();
        $films = Film::all();
        $tickets = Ticket::all();
        return view('users.show')->with('user',$user)->with('sessions',$sessions)->with('films',$films)->with('tickets',$tickets);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'cpf' => 'required|min:11|max:11',
            'type' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('mensagem', 'Dados inválidos');
                return redirect()->route('user.edit',$user->id);
            }
       $pass = $request->get('password');
       $user->update($request->merge(['password' => Hash::make($request->get('password'))])->except([$pass ? '' : 'password']));
       $user->save();
       session()->flash('mensagem', 'Usuário atualizado com sucesso!');
       return redirect()->route('user.show',$user->id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\procedures  $procedures
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      $user->delete();
      session()->flash('mensagem', 'Usuário excluido com sucesso!');
      return redirect()->route('user.index');
      
  }
}

