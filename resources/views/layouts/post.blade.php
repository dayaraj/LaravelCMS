@extends('layouts.blog-post')




@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{asset($post->photo->file)}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">

        {{$post->body}}
    </p>

    <hr>

    <!-- Blog Comments -->
@if(Auth::check())

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        {!! Form::open(['method'=>'POST','action'=>'PostCommentsController@store','files'=>true]) !!}
        <div class="form-group ">
            <input type = "hidden" name = "post_id" value="{{$post->id}}" >
            <div class="form-group  ">
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
            </div>


            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
        </div>


        {!! Form::close() !!}




        {{--        <form role="form">--}}
        {{--            <div class="form-group">--}}
        {{--                <textarea class="form-control" rows="3"></textarea>--}}
        {{--            </div>--}}
        {{--            <button type="submit" class="btn btn-primary">Submit</button>--}}
        {{--        </form>--}}
    </div>
@endif

    <!-- Posted Comments -->

    <!-- Comment -->
    <div class="media">
        @if($comments)
            @foreach($comments as $comment)
        <a class="pull-left" href="#">
            <img class="media-object" height="60" width="60" src="{{asset($comment->photo)}}">
        </a>
        <div class="media-body">
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at->diffForHumans()}}</small>
            </h4>
            {{$comment->body}}
        </div>
            @endforeach
        @endif
    </div>

    <!-- Comment -->
    <div class="media">


        <a class="pull-left" href="#">
            <img class="media-object" src="http://placehold.it/64x64" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading">
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>

    </div>





@stop
