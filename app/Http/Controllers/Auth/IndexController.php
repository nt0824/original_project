<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// モデルの読み込み
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        // データを取得する
        $posts = Post::orderBy('created_at', 'desc')->get();        // ビューに取得したデータを渡して表示する
        return view('posts')->with('posts', $posts);
    }
}
