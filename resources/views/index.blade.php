@extends('layout/master')

@section('content')
<div class="container content">
    <article style="float:left;width:75%;">
        @foreach ($entry as $news)
            <h2><a id="{{$news->id}}">{{$news->title}}</a></h2>
            <p style="color:#aaa;">Posted at {{ date("d M Y",strtotime($news->created_at)) }}</p>
            <p>{{$news->body}}</p>
        @endforeach
    </article>
    <section class="four">
        <p class="panel-title">Latest downloads</p>
        <ul style="list-style:none;padding:0;margin:0;">
            <li><a href="#">Download entry</a></li>
            <li><a href="#">Download entry</a></li>
            <li><a href="#">Download entry</a></li>
        </ul>
        <p class="panel-title">Partners</p>
        <ul style="list-style:none;padding:0;margin:0;">
            <li><a href="#"><img src=""/></a></li>
            <li><a href="#"><img src=""/></a></li>
            <li><a href="#"><img src=""/></a></li>
        </ul>
    </section>
    <div style="clear:both;"></div>
</div> 
@endsection
