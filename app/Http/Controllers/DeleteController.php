<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// モデルの読み込み
use App\Models\Post;
// 403エラーを出すためのクラスを読み込む
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
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
        // データの削除
        $post->delete();
        //成功メッセージ
        return redirect()->route('index')->with('success', '投稿が完了しました。');
        // リダイレクト
        return redirect()->route('index')->with('success', '投稿を削除しました。');
        // ログインしているユーザーのIDと投稿IDが一致しなかったら403エラーを出す
        if (!$this->checkOwnPost($request->user()->id, $postId)) {
        throw new AccessDeniedHttpException();}

    }
}
