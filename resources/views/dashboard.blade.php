<x-app-layout>
    <x-slot name="header">

        <form method="POST" action="">
        @csrf



        <div>
            <label for="title">タイトル</label>
            <input id="title" type="text" name="title" value="{{ old('title') }}">

            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="body">内容</label>
            <textarea id="body" name="body">{{ old('body') }}</textarea>

            @error('body')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">登録</button>
    </form>

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
    <button
        class="bg-red-500 text-white px-4 py-2 rounded"
    >
        削除
    </button>
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