<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::paginate(4);
        $users = User::all();
        return view('index',[
            "posts" => $posts
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
        $path = "";
        $this->getImageUrl($path, $request);
        $inputData = $request->only(['title', 'description', 'user']);
        Post::create([
            'title' => $inputData['title'],
            'description' => $inputData['description'],
            'user_id' => $inputData['user'],
            'image' => $path
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
        $path = "";
        $inputData = $request->only(['title', 'description', 'user']);

        $post = Post::find($request->post);
        Storage::delete("public/".$post->image);
        $this->getImageUrl($path, $request);

        $post->slug = null;
        $post->update([
            'title' => $inputData['title'],
            'description' => $inputData['description'],
            'user_id' => $inputData['user'],
            'image' => $path
        ]);


        return redirect()->route('posts.index');
    }

    public function destroy()
    {
        $request = request();
        $postId = $request->post;
        $post = Post::find($postId);

        Storage::delete("public/".$post->image);
        $post->delete();
        return redirect()->route('posts.index');
    }


    
    private function getImageUrl(&$path, $request)
    {
        if($request->file('image'))
        {
            $path = $request->file('image')->store('public/images');
            $path = explode("/", $path);
            array_shift($path);
            $path = implode("/", $path);
        }
    }
}
