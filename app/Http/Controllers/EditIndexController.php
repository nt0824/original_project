<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// モデルの読み込み
use App\Models\Post;
// 403エラーを出すためのクラスを読み込む
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


class EditIndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
         // リクエストしたURLからpostIdを取得
         $postId = (int) $request->route('postId');
         // 指定したpostIdでデータを取得。firstOrFail()は指定したidのデータが存在しなかった場合エラーを出す（404）
         $post = Post::where('id', $postId)->firstOrFail();
         // データを取得して表示する
         return view('editindex', ['post' => $post]);
         // ログインしているユーザーのIDと投稿IDが一致しなかったら403エラーを出す
        if (!$this->checkOwnPost($request->user()->id, $postId)) {
        throw new AccessDeniedHttpException();}

    }
    // ログインしているユーザーのIDと投稿のIDが一致するか確認するメソッド
    public function checkOwnPost(int $userId, int $postId): bool {
        $post = Post::where('id', $postId)->first();
        if (!$post){
        return false;
    }

    return $post->user_id === $userId;
    
}

}
