@extends('layouts.admin')




@section('content')
    <h1>Edit Post</h1>
    <div class="row">
        <div class="col-sm-3">

            <img src="{{asset($post->photo ? $post->photo->file : 'htttp://placehold.it/400*400')}}" height="130" class = "image-responsive img-rounded" alt="Photo">

        </div>

        <div class="col-sm-9">

    {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id] , 'files' => true]) !!}

    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id','Category') !!}
        {!! Form::select('category_id', $category,null,['class'=>'form-control']) !!}
    </div>

            <div class="form-group">
                {!! Form::label('photo_id','File:') !!}
                {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
            </div>

    <div class="form-group">
        {!! Form::label('body','Description') !!}
        {!! Form::textarea('body',null,['class'=>'form-control']) !!}
    </div>

        </div>

    <div class="form-group">
        {!! Form::submit('Update Post',['class'=>'btn btn-primary']) !!}
    </div>




    {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE','class'=>'pull-right','action'=>['AdminPostsController@destroy',$post->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete Post',['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}

    </div>


    @if(count($errors)>0)

        <div class="alert alert-danger">
            <ul>

                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach


            </ul>



        </div>


    @endif





@stop
