<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LessonController extends Controller
{
    public function  create()
    {
        return view ('lessons.add-lesson');
    }
public function test() {
    return view('test');
}
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'lector' => 'required|string|max:255',
        ]);
    }

}
