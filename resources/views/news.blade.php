@extends('layout/master')
<head>
    <title>{{$entry->title}} - VertexDezign</title>
</head>
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
    <div class='container'>
        <article style="padding:5px;">
            @if(isset($entry->imgsrc))
                <img style="width:100%;height:100%;" src="{{URL('/media/', $entry->imgsrc)}}" />
            @endif
            {!!$entry->body!!}
        </article>
    </div>
@endsection