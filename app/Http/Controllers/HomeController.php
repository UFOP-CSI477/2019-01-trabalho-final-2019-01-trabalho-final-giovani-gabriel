<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $filmsEmCartaz = Film::where('released', 1)->get();
        $filmsEmBreve = Film::where('released', 0)->get();
        return view('home')->with('filmsEmBreve', $filmsEmBreve)->with('filmsEmCartaz', $filmsEmCartaz);
    }
}
