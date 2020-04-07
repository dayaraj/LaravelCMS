@extends('layouts.admin')



@section('content')
    @if(Session::has('deleted_user'))
        <p class="bg-danger">{{session('deleted_user')}}</p>


    <h1>User</h1>
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
              <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
              <th>Role</th>
              <th>IsActive</th>
              <th>Created at</th>
              <th>Updated at</th>
          </tr>
        </thead>
        <tbody>
        @if($users)
            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
              <td><img src ="{{$user->photo ? $user->photo->file : 'no photo'}}"></td>
              <td><a href = "{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
              <td>{{$user->role->name}}</td>
              <td>{{$user->isActive == 1 ? 'Active' : 'Not Active'}}</td>
              <td>{{$user->created_at->diffForHumans()}}</td>
              <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
          <tr>
          @endforeach
            @endif
        </tbody>
      </table>


 @stop
