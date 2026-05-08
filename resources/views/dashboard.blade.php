<x-app-layout>
    <x-slot name="header">

        @csrf

        <div class="bg-white p-6 rounded shadow mb-6">

            <form method="POST" action="{{ route('todos.store') }}" class="space-y-4">
                @csrf

                {{-- タイトル --}}
                <div>
                    <label
                        for="title"
                        class="block text-sm font-medium text-gray-700">
                        タイトル
                    </label>

                    <input
                        id="title"
                        type="text"
                        name="title"
                        value="{{ old('title') }}"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm">

                    @error('title')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- 内容 --}}
                <div>
                    <label
                        for="body"
                        class="block text-sm font-medium text-gray-700">
                        内容
                    </label>

                    <input
                        id="body"
                        name="body"
                        rows="4"
                        class="mt-1 block w-full rounded border-gray-300 shadow-sm">{{ old('body') }}</input>

                    @error('body')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                {{-- ボタン --}}
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        登録
                    </button>
                </div>

            </form>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    {{-- ここにTodo一覧 --}}
                    @forelse ($todos as $todo)
                    <div class="border-b py-2">
                        <div class="font-bold">
                            {{ $todo->title }}
                        </div>

                        <div class="text-sm text-gray-500">
                            {{ $todo->body }}
                        </div>
                        <div class="flex justify-end">
                            <a href="{{ route('todos.edit', $todo) }}">編集</a>
                        </div>
                        <div class="flex justify-end">
                            <form action="{{ route('todos.destroy', $todo) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('本当に削除しますか？')">削除</button>
                </form>
                        </div>

                    </div>

                    @empty
                    <div>Todoがありません</div>
                    @endforelse

                </div>

            </div>
        </div>
    </div>
</x-app-layout>