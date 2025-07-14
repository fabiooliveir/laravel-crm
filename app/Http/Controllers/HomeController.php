<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Exibe a página inicial.
     */
    public function index(): View
    {
        return view('welcome');
    }
}