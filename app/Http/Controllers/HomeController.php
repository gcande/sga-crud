<?php

namespace App\Http\Controllers;
use App\Models\TblPrograma;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCount = User::count();
        $conteoProgramas = TblPrograma::count();
        return view('home', ['conteoProgramas' => $conteoProgramas, 'usersCount' => $usersCount]);

        // return view('home');
    }
}
