<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LeaderboardController extends Controller
{
    public function index()
    {
        return view('leaderboard', ['top' => DB::select('select * from users order by xp desc limit 10;')]);
    }
}
