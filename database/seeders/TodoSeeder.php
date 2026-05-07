<?php

namespace Database\Seeders;

use App\Models\Todo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;

class TodoSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();

        if (! $user) {
            return;
        }

        Todo::create([
            'user_id' => $user->id,
            'title' => 'サンプルTodo',
            'description' => '一覧表示確認用のTodoです。',
            'due_date' => now()->addWeek()->toDateString(),
            'is_done' => false,
        ]);
    }

}
