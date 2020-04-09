@extends('layouts.admin')




@section('content')
    <h1>Category</h1>

  <div class="col-sm-6">
       {!! Form::open(['method'=>'POST','action'=>'AdminCategoriesController@store']) !!}
              <div class="form-group">
                  {!! Form::label('name','Name:') !!}
                  {!! Form::text('name',null,['class'=>'form-control']) !!}
               </div>

            <div class="form-group">
                {!! Form::submit('Create category',['class'=>'btn btn-primary']) !!}
            </div>


           {!! Form::close() !!}


  </div>

    <div class="col-sm-6">
     <table class="table table-hover">
         <thead>
           <tr>
             <th>Name</th>
             <th>Created at</th>
             <th>Updated at</th>
           </tr>
         </thead>
         <tbody>
           <tr>
               @if($categories)
                   @foreach($categories as $category)
                       <td><a href = "{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
             <td>{{$category->created_at->diffForHumans()}}</td>
             <td>{{$category->updated_at->diffForHumans()}}</td>
           </tr>
          @endforeach
         @endif
         </tbody>
       </table>

    </div>


@stop
