<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use \App\User;
use \App\Library;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function upvote(Request $req)
    {
      DB::table('contents')
                  ->where('id', $req->content_id)
                  ->update(['rank' => $req->rank + 1]);
      return redirect('/home');
    }

    public function downvote(Request $req)
    {
      DB::table('contents')
                  ->where('id', $req->content_id)
                  ->update(['rank' => $req->rank - 1]);
      return redirect('/home');
    }
}
