<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // $posts=[
        //     [
        //         'id' => '22',
        //         'title' => 'first post',
        //         'created_at' => '2020-05-02',
        //     ],
        //     [
        //         'id' => '24',
        //         'title' => 'second post',
        //         'created_at' => '2018-05-02',
        //     ],
        //     [
        //         'id' => '26',
        //         'title' => 'third post',
        //         'created_at' => '2019-05-02',
        //     ]
        //     ];
        return view('index',[
            "posts" => $posts
        ]);
    }

    public function show()
    {
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        return view('show', [
            "post" => $post
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store()
    {
        $request = request();
        Post::create([
            'title' => $request->title,
            'description' => $request->description
        ]);
        return redirect()->route('posts.index');
    }
}
