@extends('layouts.admin')


@section('content')
    <h1>Media</h1>

    <table class="table table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Created at</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              @if($photos)
                  @foreach($photos as $photo)
            <td>{{$photo->id}}</td>
                      <td><img height="50" src = "{{asset($photo->file)}}"></td>
                      <td>{{$photo->created_at->diffForHUmans()}}</td>
                      <td>
                   {!! Form::open(['method'=>'DELETE','action'=>['AdminMediasController@destroy',$photo->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete Photo',['class'=>'btn btn-danger']) !!}
                        </div>
                       {!! Form::close() !!}
                  </td>


          </tr>
        @endforeach
        @endif

        </tbody>
      </table>

    @stop
