<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Micropost;

class FavoritesController extends Controller
{
    /**
     * 投稿ををお気に入りに追加するアクション。
     *
     * @param  $id  投稿のid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idの投稿をお気に入りにする
        \Auth::user()->favorite($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    /**
     * 投稿をお気に入りから外すアクション。
     *
     * @param  $id  投稿のid
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         // 認証済みユーザ（閲覧者）が、 idの投稿のお気に入りを外す
        \Auth::user()->unfavorite($id);
        // 前のURLへリダイレクトさせる
        return back();
     }
}
