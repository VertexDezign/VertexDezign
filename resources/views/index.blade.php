@extends('layout/master')

@section('content')
<div class="banner has-dots" style="overflow:hidden;height:576px;">
    <ul style="width: 200%;position:relative;overflow:hidden;left:0%;height:400px;">
        <li style="width: 50%; background:url(http://vertexdezign.net/images/ggg.jpg) center center; background-size:cover;position:relative;background-position:center center;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="two" style="margin-left:25%;">
                        <div class="content">
                            <h2>JCB 320T</h2>
                            <p>VertexDezign is currently working on a new project!</p>
                        </div>
                        <a href="#" class="button">Check out!</a>
                    </div>
                </div>
            </div>
        </li>
        <li style="width: 50%; background:url(http://ls-bilder.de/uploads/SZDGNPnqkk.jpg) center center; background-size:cover;position:relative;background-position:center center;background-repeat:no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="two" style="margin-left:25%;">
                        <div class="content">
                            <h2>Niggels spoiled!</h2>
                            <p>View these screenshots from Niggels.</p>
                        </div>

                        <a href="#" class="button">Check out!</a>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</div>
<div class="container">
    <div class="arrow"></div>
</div>
<section style="margin-top:100px;">
    <div class="container content" style="padding-top:35px;">
        <div class="three">
            <div style="text-align: center;">
                <div class="icon">
                    <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/projects')}}}"><img src="{{URL('/images/layout/project.png')}}"/></a></div>
                    <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/projects')}}}">Projects</a></h2>
                </div>
                <p>Check out our latest projects.</p>
            </div>
        </div>
        <div class="three">
            <div style="text-align: center;">
                <div class="icon">
                    <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/downloads')}}}"><img src="{{URL('/images/layout/download.png')}}"/></a></div>
                    <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/downloads')}}}">Downloads</a></h2>
                </div>
                <p>Get our latest mods here.</p>
            </div>
        </div>
        <div class="three">
            <div style="text-align: center;">
                <div class="icon">
                    <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/about')}}}"><img src="{{URL('/images/layout/people.png')}}"/></a></div>
                    <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/about')}}}">About us</a></h2>
                </div>
                <p>Curious what makes VertexDezign?</p>
            </div>
        </div>
    </div>
    <div style="clear:both;height:35px;"></div>
</section>
{{--<div class="container content" style="margin-top:100px;">--}}
    {{--<div style="text-align: center;">--}}
        {{--<h1>WELCOME TO VERTEXDEZIGN</h1>--}}
        {{--<hr style="display: block;width: 15%;margin: 1em auto;border: 1px solid #2D8633;">--}}
        {{--<p style="color:#999;">Our team is working on 3d models for over 5 years now. You can find our references on GIANTS ModHub and other pages for Farming Simulator.</p>--}}
    {{--</div>--}}
{{--</div>--}}
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
@endsection