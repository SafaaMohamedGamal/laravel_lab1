<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorePostRequest;
use App\Post;


class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(
            Post::with('User')->paginate(2)
        );
    }
    public function show($post)
    {
        return new PostResource(
            Post::find($post)
        );
    }
    public function store(StorePostRequest $request)
    {
        $path = "";
        $this->getImageUrl($path, $request);
        return new PostResource(
            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user,
                'image' => $path
            ])
        ); 
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
