<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $title = "News of the day";
        $description = "Super short content for the latest news!!!";
        return view('news')->with(['title' => $title, 'description' => $description]);
    }
}
