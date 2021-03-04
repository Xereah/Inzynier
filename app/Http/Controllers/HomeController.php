<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorie;
use App\Models\Produkty;
use App\Models\Task;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tasks= Task::all();
        $produkty= Produkty::all();
        $kategorie = Kategorie::all();
        return view('FrontEnd.Home.home',compact('kategorie','produkty','tasks'));
    }
}
