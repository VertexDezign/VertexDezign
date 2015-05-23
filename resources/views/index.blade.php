@extends('layout/master')

@section('content')
<div class="container content">
    <article style="float:left;width:75%;">
        @foreach ($entry as $news)
            <h2><a id="{{$news->id}}">{{$news->title}}</a></h2>
            <p>{{$news->body}}</p>
        @endforeach
    </article>
    <section class="four">
        <ul style="list-style:none;padding:0;margin:0;">
            <li>
                <p>Latest downloads</p>
            </li>
            <ul style="list-style:none;padding:0;margin:0;">
                <li><a class="green" href="#" onclick="scroll('#');">Download entry</a></li>
                <li><a class="green" href="#" onclick="scroll('#');">Download entry</a></li>
                <li><a class="green" href="#" onclick="scroll('#');">Download entry</a></li>
            </ul>            
        </ul>
    </section>
    <div style="clear:both;"></div>
</div> 
@endsection
