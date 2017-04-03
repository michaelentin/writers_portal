<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Content;
use Illuminate\Support\Facades\Auth;
use \App\Library;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::with('user', 'comments.user')->get();

        //dd($library);
        return view('home', compact('contents', 'library'));
    }
}
