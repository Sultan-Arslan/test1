<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\LessonUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller


{
    public function index(Request $request)
    {
        $query = Lesson::query();

        if ($request->filled('id')) {
            $query->where('id', $request->id);
        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('description')) {
            $query->where('description', 'like', '%' . $request->description . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('date', $request->date);
        }

        if ($request->filled('specialist')) {
            $query->whereHas('specialist', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->specialist . '%');
            });
        }

        if ($request->filled('capacity')) {
            $query->where('capacity', $request->capacity);
        }

        if ($request->filled('bought')) {
            $query->whereHas('students', function ($q) use ($request) {
                $q->havingRaw('COUNT(*) = ?', [$request->bought]);
            });
        }

        if ($request->filled('remaining')) {
            $query->whereRaw('capacity - (SELECT COUNT(*) FROM lesson_student WHERE lesson_id = lessons.id) = ?', [$request->remaining]);
        }

        $lessons = $query->paginate(10);

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
        $students = $lesson->students;
        $isAdmin = Auth::user()->hasRole('admin'); // Проверка роли администратора через Spatie

        return view('lessons.show', compact('lesson', 'students', 'isAdmin'));
    }

    public function registerAdmin(Request $request, Lesson $lesson)
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            DB::table('lesson_users')->insert([
                'lesson_id' => $lesson->id,
                'user_id' => $user->id,
            ]);
        }

        return redirect()->route('lessons.show', $lesson->id);
    }

    public function unregister(Request $request, Lesson $lesson, $userId = null)
    {
        $user = Auth::user();

        // Если администратор, то может удалять любого пользователя
        if ($user->hasRole('admin')) {
            $targetUserId = $userId ?? $user->id;
        } else {
            // Обычный пользователь может удалять только себя
            $targetUserId = $user->id;
        }

        // Проверяем, зарегистрирован ли пользователь на этот урок
        $alreadyRegistered = DB::table('lesson_users')
            ->where('lesson_id', $lesson->id)
            ->where('user_id', $targetUserId)
            ->exists();

        if (!$alreadyRegistered) {
            return redirect()->back()->with('error', 'Пользователь не зарегистрирован на этот урок.');
        }

        // Удаляем запись пользователя с урока
        DB::table('lesson_users')
            ->where('lesson_id', $lesson->id)
            ->where('user_id', $targetUserId)
            ->delete();

        return redirect()->route('lessons.show', $lesson->id)->with('success', 'Пользователь успешно отписан от урока.');
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

    public function deletedLessonUser($id , Request $request)
    {

        $request->validate([
            'APIKEY' =>'required|string'
        ]);
        $API_KEY = $request->APIKEY;
//        dd($API_KEY);
        if ($API_KEY != 'EcrlWmPH39h2') {
            return response()->json(['message'=>"You API invailed"], 404);
        }
        $lessonUser = LessonUser::find($id);
        if(!isset($lessonUser->id)){
            return response()->json(['message'=>"lessonUser with id=$id not found."], 404);
        }
        $lessonUser->delete();
        return response(status:204);//ответ без тела только статус 204

    }
}
