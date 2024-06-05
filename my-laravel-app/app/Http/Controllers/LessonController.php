<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LessonController extends Controller
{
    public function  create()
    {
        return view ('lessons.add-lesson');
    }
    public function test() {
        $lessons = LessonUser::all();
        return view('home', compact('lessons'));
    }

    public function index()
    {
        $lessons = Lesson::with('specialist','students')->get();
//        $lessons = LessonUser::all();

        return view('dashboard', compact('lessons'));
//        $lessons = Lesson::all();
        return $lessons;
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
