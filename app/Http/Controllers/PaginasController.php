<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginasController extends Controller
{
    public function preco()
    {
        return view('precos');
    }

    public function snackBar()
    {
        return view('snackBar');
    }
}
