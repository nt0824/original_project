<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            詳細画面
        </h2>
        <a href="{{ route('dashboard') }}">戻る</a>

    </x-slot>

    <form action="{{ route('edit' ,['postId' => $post->id])  }}" method="post">
        @csrf
        @method('PUT') 
        <div>
        <label for="title">タイトル</label>
        <p>100字まで</p>
        <input type="text" id="title" placeholder="タイトルを編集" name="title" value="{{ $post->title}}">

        </div>
        
        <div>
        <label for="content">内容</label>
        <p>200字まで</p>
        <textarea name="content" id="content" cols="30" rows="10" placeholder="内容を編集">{{ $post->content}}</textarea>

        </div>

        <div>
        <label for="action_date">行動日時</label>
        <input type="datetime-local" id="action_date" name="action_date" value="{{ $post->action_date}}">

        </div>
        

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)

                        <li style="color: red;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <button type="submit">送信</button>
        {{-- <button type="submit">削除</button> --}}


        @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
        @endif


    </form> 
</x-app-layout>
