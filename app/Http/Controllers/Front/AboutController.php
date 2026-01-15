<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;

class AboutController extends Controller
{
    public function index()
    {
        $team_members = TeamMember::get()->take(4);
        return view('front.about', compact('team_members'));
    }
}
