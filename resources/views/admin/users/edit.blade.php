@extends('layouts.admin')



@section('content')
    <h1>Edit User</h1>

    <div class="row">
    <div class="col-sm-3">

        <img src="{{asset($user->photo ? $user->photo->file : 'htttp://placehold.it/400*400')}}" height="130" class = "image-responsive img-rounded" alt="Photo">

    </div>


    <div class="col-sm-9">

    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'files'=> true]) !!}


    <div class="form-group">
        {!! Form::label('name','Name:') !!}
        {!! Form::text('name',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email','Email:') !!}
        {!! Form::text('email',null,['class'=>'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('password','Password:') !!}
        {!! Form::password('password',['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id','Role:') !!}
        {!! Form::select('role_id', $roles ,null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('isActive','Status:') !!}
        {!! Form::select('isActive',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','File:') !!}
        {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update User',['class'=>'btn btn-primary']) !!}
    </div>


    {!! Form::close() !!}
        {!! Form::open(['method'=>'DELETE','class'=>'pull-right','action'=>['AdminUsersController@destroy',$user->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete User',['class'=>'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>




    </div>

<div class="row">
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
</div>
