<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;
class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(4);
        $users = User::all();
        $postUser = [];
        
        return view('index',[
            "posts" => $posts,
            "postUser" => $postUser
        ]);
    }

    public function show()
    {
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);
        $user = User::find($post->user_id);
        // dd($post->created_at->format('l jS \\of F Y h:i:s A'));
        return view('show', [
            "post" => $post,
            "user" => $user
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('create',[
            'users' => $users
        ]);
    }

    public function store(StorePostRequest $request)
    {
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

    public function update(UpdatePostRequest $request)
    {
        $post = Post::find($request->post);
        $post->slug = null;
        $post->update([
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
