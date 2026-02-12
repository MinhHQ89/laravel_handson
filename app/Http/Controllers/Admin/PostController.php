<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function showform() {
        return view('admin.create');
    }

    public function validationform(Request $request) {
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required'
        ]);

        dd($request->all());
    }
}
