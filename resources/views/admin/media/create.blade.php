@extends('layouts.admin')


@section('content')
    <h1>Upload Media</h1>


    {!! Form::open(['method'=>'POST','action'=>'AdminMediasController@store','class'=>'dropzone']) !!}



    {!! Form::close() !!}



@stop

   @section('scripts')

       <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/dropzone.min.js"></script>

       @stop
