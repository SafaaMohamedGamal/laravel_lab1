
@extends('layout.app')

@section('content')
<a class="btn btn-info btn-lg btn-block mb-5" href="{{route('posts.create')}}">Add Post</a>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Describtion</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
      @foreach($posts as $post)
        <tr>
        <th scope="row">{{$post->id}}</th>
        <td>{{$post->title}}</td>
        <td>{{$post->description}}</td>
        <td>
          <a class="btn btn-success btn-sm" href="{{route('posts.show', [ 'post' => $post->id ])}}">Show</a>
          <a class="btn btn-success btn-sm" href="">Update</a>
          <a class="btn btn-success btn-sm" href="">Delete</a>
        </td>
        </tr>
      @endforeach
  </tbody>
</table>


@endsection