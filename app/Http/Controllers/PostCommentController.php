<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostCommentController extends Controller
{
    
    public function index()
    {
        // $posts = Post::all();
        return 'xx';
        $request = request();
        dd($request);
        $posts = Post::paginate(4);
        $users = User::all();
        return view('index',[
            "posts" => $posts
        ]);
    }
}
