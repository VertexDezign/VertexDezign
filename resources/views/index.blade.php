@extends('layout/master')

@section('content')
<header>
    <div style="height:100%;">
        <div class="content">
            <h2>Find our projects!</h2>
            <hr>
            <p>Check on what projects VertexDezign is working on.</p>
            <button onclick="window.location.href='{{URL('/projects')}}'">Find out!</button>
        </div>
        <div class="overlay"></div>
    </div>
    <div style="clear:both;"></div>
</header>
<div class="container content" style="margin-top:100px;">
    <div style="text-align: center;">
        <h1>WELCOME TO VERTEXDEZIGN</h1>
        <hr style="display: block;width: 15%;margin: 1em auto;border: 1px solid #2D8633;">
        <p style="color:#999;">Our team is working on 3d models for over 5 years now. You can find our references on GIANTS ModHub and other pages for Farming Simulator.</p>
    </div>
</div>
<section class="sect-news">
    @foreach($newsEntry as $news)
        <article>
            <div class="two" style="text-align:center;padding:0;height:500px;">
                <a href="{{ URL::route('show_news', $news->id) }}">
                    <div class="articlePanel" style="height:100%;background:url(http://ls-bilder.de/uploads/lyHKTmjLkk.png);background-size:cover;background-position:center center;background-repeat:no-repeat;">
                        <div class="content">
                            <h1>{{$news->title}}</h1>
                            <hr>
                            <p class="author">Posted on {{ date("d m Y",strtotime($news->created_at)) }} by {{$news->getAuthor->username}}</p>
                            <p>{!! $news->body !!}</p>
                        </div>
                        <div class="overlay"></div>
                    </div>
                </a>
            </div>
        </article>
    @endforeach
    <div style="clear:both;"></div>
</section>
<div class="container content" style="margin-top:100px;">
    <div style="text-align: center;">
        <h1>MEET THE TEAM</h1>
        <hr style="display: block;width: 15%;margin: 1em auto;border: 1px solid #2D8633;">
        <p style="color:#999;">Curious what makes VertexDezign?</p>
        <button class="roundButton green" onclick="window.location.href='{{URL('/projects')}}'">Find out!</button>
    </div>
</div>
<section style="margin-top:100px;">
    <div class="four">
        <div class="panel">
            <a href="#"><img  style="height:150px;vertical-align: middle;" src="http://www.gummibereifung.de/sites/default/files/field/image/16_grasdorf-logo.jpg"/></a>
        </div>
    </div>
    <div class="four">
        <div class="panel">
            <a href="#"><img  style="height:150px;vertical-align: middle;" src="http://www.gummibereifung.de/sites/default/files/field/image/16_grasdorf-logo.jpg"/></a>
        </div>
    </div>
    <div class="four">
        <div class="panel">
            <a href="#"><img  style="height:150px;vertical-align: middle;" src="http://www.gummibereifung.de/sites/default/files/field/image/16_grasdorf-logo.jpg"/></a>
        </div>
    </div>
    <div class="four">
        <div class="panel">
            <a href="#"><img  style="height:150px;vertical-align: middle;" src="http://www.gummibereifung.de/sites/default/files/field/image/16_grasdorf-logo.jpg"/></a>
        </div>
    </div>
    <div style="clear:both;"></div>
</section>
@endsection