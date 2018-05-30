@extends('master')

@section('content')
    <a href="{{ url('/posts') }}" class="btn btn-default">Go Back</a>
        <h3>{{$post->title}}</h3>
        <hr>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                         <img style="width:100%" src="../storage/cover_images/{{ $post->cover_image }}" >
                </div>
                <div class="col-md-6 col-sm-6">
                    <p style="text-align:justify;">{{$post->body}}</p>
                    <hr>

                <div><small class="pull-right"> Written on {{ $post->created_at }} by {{$post->user->name}}</small></div>
           </div>
            </div>
            
        </div>
         
    
    
    <hr>

    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="{{$post->id}}/edit"  class="btn btn-default" >Edit</a>

            {!!Form::open(['action'=> ['PostsController@destroy', $post->id], 'method'=> 'POST', 'class'=> 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class'=> 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection

