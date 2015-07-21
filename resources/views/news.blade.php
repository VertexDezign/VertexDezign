@extends('layout/master')
@section('title', $entry->title)
@section('description', 'This is the news page of VertexDezign')
@section('content')
    <div style="color: #444;border-bottom: 1px solid #eee;border-top: 1px solid #eee;">
        <div class="container">
            <div class="two">
                <h1 style="line-height:70px;font-size:23px;font-weight:100;">{{$entry->title}}</h1>
            </div>
            <div class="two">
                <div class="page-route">
                    <span>Posted at: </span>{{ date("d M Y",strtotime($entry->created_at)) }}<span> by </span>{{$entry->getAuthor->username}}
                    <div style="clear:both;"></div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    @if(isset($entry->imgsrc))
        <header style="background:url({{URL('/media/', $entry->imgsrc)}}) center center;background-size:cover;position:relative;background-repeat:no-repeat;"></header>
    @endif
    <div class='container'>
        <article style="padding:10px;">
            {!!$entry->body!!}
        </article>
    </div>
@endsection