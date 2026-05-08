<?php
namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->get();

        return view('dashboard', compact('todos'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => ['required', 'max:255'],
        'body' => ['nullable'],
    ]);

    Todo::create([
        'title' => $validated['title'],
        'body' => $validated['body'],
        'is_done' => false,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('dashboard');
}
}