<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿一覧</title>
</head>

<body>
    <h1>投稿一覧</h1>

    <div>
        @auth
        <p>投稿フォーム</p>
        <form action="{{ route('create') }}" method="post">
            @csrf
            <label for="content">投稿</label>
            <span>140字まで</span>
            <textarea name="content" id="content"
            cols="30" rows="10" placeholder="投稿内容を入力">
            {{ old('content') === '' ? '' : old('content')
            }}</textarea>
            @error('content')
            <p style="color: red">{{ $message }}</p>
            @enderror
    　　　　<button type="submit">送信</button>
</form>
@endauth

        <p>投稿一覧</p>
        <ul>
            @foreach ($posts as $post)
            @if (Auth::id() === $post->user_id)
                <form action="{{ route('delete', ['postId' => $post->id]) }}" method="post">
                 @csrf
                 @method('DELETE')
                 <button type="submit">削除</button>
                </form>
                <a href="{{ route('editindex', ['postId' => $post->id]) }}">編集</a>
            @endif
            <li>{{ $post->content }}
            {{ $post->user->name }}

            </li>



            @endforeach
        
        </ul>
    </div>
    
</body>
</html>