@extends('layouts.admin')


@section('content')
    <h1>Posts</h1>
        <table class="table table-hover">
            <thead>
              <tr>
                <th>Id</th>
                <th>Photo</th>
                <th>User</th>
                  <th>Category</th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>View Post</th>
                  <th>View Comments</th>
                  <th>Created at:</th>
                  <th>Updated at:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  @if($posts)
                      @foreach($posts as $post)
                          <td>{{$post->id}}</td>
                <td><img height="50" src = "{{asset($post->photo ? $post->photo->file : 'no photo')}}"></img></td>
                          <td><a href = "{{route('posts.edit',$post->id)}}" >{{$post->user->name}}</a></td>
                          <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
                  <td>{{$post->title}}</td>
                  <td>{{$post->body}}</td>
                          <td><a href = "{{route('home.post',$post->id)}}">View Post</a></td>
                          <td><a href = "{{route('comments.show',$post->id)}}">View Comments</a></td>
                  <td>{{$post->created_at->diffForHumans()}}</td>
                  <td>{{$post->updated_at->diffForHumans()}}</td>

              </tr>
              @endforeach
              @endif
            </tbody>
          </table>


    @stop
