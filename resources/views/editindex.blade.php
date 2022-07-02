<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>投稿フォーム</title>
</head>
<body>
    <a href="{{ route('index') }}">< 戻る</a>
        <p>投稿フォーム</p>
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
            <form action="{{ route('edit' ,['postId' => $post->id])  }}"
            method="post">
            @csrf
            @method('PUT') 
            <label for="content">投稿</label>
            <span>140字まで</span>       
            <textarea id="content" name="content" placeholder="投稿内容を入力">{{ $post->content }}</textarea>
            @error('content')
            <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">更新</button>
            </form>
            
    
</body>
</html>