<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
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
        $users = User::all();
        return view('create',[
            'users' => $users
        ]);
    }

    public function store()
    {
        $request = request();
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user
        ]);
        return redirect()->route('posts.index');
    }

    public function edit()
    {
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        $users = User::all();
        return view('edit',[
            "post" => $post,
            'users' => $users
        ]);
    }

    public function update()
    {
        $request = request();
        // dd($request->post);
        Post::where("id", $request->post)->update(
                [
                    'title' => $request->title, 
                    'description' => $request->description, 
                    'user_id' => $request->user
                ]);

        return redirect()->route('posts.index');
    }

    public function destroy()
    {
        $request = request();
        $postId = $request->post;
        Post::where("id", $postId)->delete();

        return redirect()->route('posts.index');
    }
}
