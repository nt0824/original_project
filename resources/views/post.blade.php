<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            投稿画面
        </h2>
        <a href="{{ route('dashboard') }}">戻る</a>

    </x-slot>

    <form action="{{ route('create') }}" method="post">
        @csrf
        <div>
        <label for="title">タイトル</label>
        <p>100字まで</p>
        <input type="text" id="title" placeholder="タイトルを入力" name="title" value="{{ old('title') === '' ? '' : old('title') }}">
        </div>
        
        <div>
        <label for="content">内容</label>
        <p>200字まで</p>
        <textarea name="content" id="content" cols="30" rows="10" placeholder="内容を入力">{{ old('content') === '' ? '' : old('content') }}</textarea>
        </div>

        <div>
        <label for="action_date">行動日時</label>
        <input type="datetime-local" id="action_date" name="action_date" value="{{ old('action_date') === '' ? '' : old('action_date') }}">

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
    </form>    
</x-app-layout>
