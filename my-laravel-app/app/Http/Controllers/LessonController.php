<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonUser;
use App\Models\User;
use Illuminate\Http\Request;

class LessonController extends Controller


{


    public function index()
    {
        $lessons = Lesson::all();
        return view('lessons.index', compact('lessons'));
    }

    public function create()
    {
        $specialists = User::all(); // Предполагается, что специалисты хранятся в таблице users
        return view('lessons.create', compact('specialists'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'specialist_id' => 'required|exists:users,id',
            'capacity' => 'required|integer|min:0',
        ]);

        Lesson::create($request->all());

        return redirect()->route('lessons.index')->with('success', 'Lesson created successfully.');
    }

    public function show(Lesson $lesson)
    {
        return view('lessons.show', compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        $specialists = User::all();
        return view('lessons.edit', compact('lesson', 'specialists'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
            'specialist_id' => 'required|exists:users,id',
            'capacity' => 'required|integer|min:0',
        ]);

        $lesson->update($request->all());

        return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully.');
    }

    public function destroy(Lesson $lesson)
    {
        $lesson->delete();

        return redirect()->route('lessons.index')->with('success', 'Lesson deleted successfully.');
    }
}
