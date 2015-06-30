@extends('layout/master')

@section('content')
    <header style="height:20px;"></header>
    <div class='container'>
        <h2>{{$entry->title}}</h2>
        <hr/>
        <article>
            <p style="color:#aaa;">Posted at {{ date("d M Y",strtotime($entry->created_at)) }} by {{$entry->getAuthor->username}}</p>
            <p>{!!$entry->body!!}</p>
            <?php
            if (isset($entry->images))
            {
            ?>
            <img src="{{$entry->images}}" />
            <?php
            }
            ?>
        </article>
    </div>
@endsection