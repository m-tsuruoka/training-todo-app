<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Seeder;

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
            'body' => '一覧表示確認用のTodoです。',
            'is_done' => false,
        ]);

        Todo::create([
            'user_id' => $user->id,
            'title' => 'これはテストです。',
            'body' => 'sample。',
            'is_done' => false,
        ]);
    }
}