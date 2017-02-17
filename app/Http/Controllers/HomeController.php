<?php

namespace Hindsight\Http\Controllers;

use Hindsight\Tweets\Tweet;

class HomeController extends Controller
{
    public function index()
    {
        return view('index')->withTweets(Tweet::orderBy('created_at', 'desc')->take(3)->get());
    }
}
