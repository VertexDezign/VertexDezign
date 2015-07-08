@extends('layout/master')

@section('content')
<div class="banner has-dots" style="overflow:hidden;height:576px;">
    <ul style="width: 200%;position:relative;overflow:hidden;left:0%;height:400px;">
        @foreach($sliderEntry as $slide)
            <li style="width: 50%; background:url({{URL('/media', $slide->image)}}) center center; background-size:cover;position:relative;background-position:center center;background-repeat:no-repeat;">
                <div class="container">
                    <div class="row">
                        <div class="two" style="margin-left:25%;">
                            <div class="content">
                                <h2>{{$slide->title}}</h2>
                                <p>{!!$slide->desc!!}</p>
                            </div>
                            <a href="{{{URL('/', $slide->link)}}}" class="button">Check out!</a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
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
                    <hr style="width:25%;border-color:#eee;"/>
                </div>
                <p>Check out our latest projects.</p>
            </div>
        </div>
        <div class="three">
            <div style="text-align: center;">
                <div class="icon">
                    <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/downloads')}}}"><img src="{{URL('/images/layout/download.png')}}"/></a></div>
                    <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/downloads')}}}">Downloads</a></h2>
                    <hr style="width:25%;border-color:#eee;"/>
                </div>
                <p>Get our latest mods here.</p>
            </div>
        </div>
        <div class="three">
            <div style="text-align: center;">
                <div class="icon">
                    <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/about')}}}"><img src="{{URL('/images/layout/people.png')}}"/></a></div>
                    <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/about')}}}">About us</a></h2>
                    <hr style="width:25%;border-color:#eee;"/>
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
<div style="height:100px;background:#f7f7f7;"></div>
<div style="background:#f7f7f7;">
    <div class="sect-news">
        @foreach($newsEntry as $news)
            <article>
                <div class="two" style="text-align:center;padding:1px;height:500px;width:calc(50% - 2px);">
                    <a href="{{ URL::route('show_news', $news->id) }}">
                        <div class="articlePanel" style="height:100%;background:url({{URL('/media', $news->imgsrc)}}) center center;background-size:cover;background-position:center center;background-repeat:no-repeat;">
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
        @if($newsEntry->render())
            <div style="text-align:center;">
                <?php echo $newsEntry->render(); ?>
            </div>
        @else
            <div style="margin-bottom:100px;"></div>
        @endif
    </div>
</div>
<section style="margin-top:100px;"></section>
@endsection