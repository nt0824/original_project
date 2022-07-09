<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// リクエストを扱うクラスを使う
use App\Http\Requests\CreateRequest;
// モデルの読み込み
use App\Models\Post;


class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        // モデルを作成する
        $post = new Post();
        // 送信されたcontentの内容をモデルのcontentに格納する
        $post->content = $request->content;
        // ユーザーのIDの取得
        $post->user_id = $request->userId();
        // データの保存
        $post->save();

        // リダイレクトする
        return redirect()->route('index');
    }
}