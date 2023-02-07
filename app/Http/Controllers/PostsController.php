<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        DB::table('posts')->insert([
            'posts' => $posts
        ]);

        return redirect('/index');
    }

}
