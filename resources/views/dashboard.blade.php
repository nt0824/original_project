<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <p>投稿画面</p>
    <ul>
       @foreach ($posts as $post)
       <li>{{ $post->title }}{{ $post->action_date}}
            <a href="{{ route('editindex',['postId' => $post->id]) }}">< 詳細</a>
        </li>

      @endforeach
  </ul>

</x-app-layout>

