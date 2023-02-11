<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class PostsController extends Controller
{
    //
    public function index(){
        $posts = DB::table('posts')
        ->join('users', 'users.id', '=', 'posts.user_id')
        ->select('posts.id', 'posts.user_id', 'posts.posts', 'posts.created_at', 'users.username', 'users.images')
        ->latest()->get();
        return view('posts.index',['posts'=>$posts]);
    }

    // 新規投稿欄
    // a

     public function create(Request $request)
    {
        $posts = $request->input('newPost');
        $id = Auth::id();

        DB::table('posts')->insert([
            'posts' => $posts,
            'user_id' => $id
        ]);

        return redirect('/top');
    }

     public function update(Request $request)
    {
        $posts = $request->input('upPost');
        $id = $request->input('id');

        DB::table('posts')
        ->where('id', $id)
        ->update([
            'posts' => $posts
        ]);

        return redirect('/top');
    }


    public function delete($id){
     \DB::table('posts')
       ->where('id', $id)
       ->delete();
     return redirect('/top');
}
}
