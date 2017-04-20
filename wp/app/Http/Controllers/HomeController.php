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
        $contents = Content::with('user', 'comments.user')->latest()->get();

        //dd($library);
        return view('home', compact('contents'));
    }

    public function sort(Request $req)
    {
        // most popular
        if ($req->sort_id == 0)
        {
            $contents = Content::with('user', 'comments.user')->orderBy('rank', 'desc')->get();
        } else if ($req->sort_id == 1) // least popular
        {
            $contents = Content::with('user', 'comments.user')->orderBy('rank', 'asc')->get();
        } else if ($req->sort_id == 2) // least recent
        {
            $contents = Content::with('user', 'comments.user')->oldest()->get();
        }  else // error handling, just show most recent
        {
            $contents = Content::with('user', 'comments.user')->latest()->get();
        }
        
        
        return view('home', compact('contents'));
    }
}
