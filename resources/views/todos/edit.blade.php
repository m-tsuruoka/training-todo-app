
<h1>Todo編集</h1>

<form action="{{ route('todos.update', $todo) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="title">タイトル</label>
        <input id="title" type="text" name="title" value="{{ old('title', $todo->title) }}">

        @error('title')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="body">内容</label>
        <textarea id="body" name="body">{{ old('body', $todo->body) }}</textarea>

        @error('body')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label>
            <input type="checkbox" name="is_done" value="1" @checked(old('is_done', $todo->is_done))>
            完了済みにする
        </label>

        @error('is_done')
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">更新</button>
</form>

<p>
    <a href="{{ route('dashboard') }}">一覧へ戻る</a>
</p>

