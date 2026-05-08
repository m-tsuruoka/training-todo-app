<?php
namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::where('user_id', auth()->id())->get();
        $todos = Todo::latest()->get();

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
 public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }
  public function update(Request $request, Todo $todo)
{
    $validated = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'body' => ['nullable', 'string'],
        'is_done' => ['nullable', 'boolean'],
    ]);

    $validated['is_done'] = $request->boolean('is_done');

    $todo->update($validated);

    return redirect()->route('dashboard');
}
public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('dashboard');
    }
}