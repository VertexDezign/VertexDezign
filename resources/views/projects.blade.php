@extends('layout/master')

@section('content')
<div class="container content">
    <article style="float:left;width:75%;">
        @foreach ($entry as $project)
            <h2><a id="{{$project->id}}">{{$project->title}}</a></h2>
            <p>{{$project->desc}}</p>
        @endforeach
    </article>
    <div style="clear:both;"></div>
</div> 
@endsection
