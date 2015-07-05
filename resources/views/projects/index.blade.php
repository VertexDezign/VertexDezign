@extends('layout.master')

@section('content')
<div style="color: #444;border-bottom: 1px solid #eee;border-top: 1px solid #eee;">
    <div class="container">
        <div class="two">
            <h1 style="line-height:70px;font-size:23px;font-weight:100;">Projects</h1>
        </div>
        <div class="two">
            <div class="page-route">
                <span>You are here: </span><a href="{{URL('/')}}">Home</a> \ Projects
                <div style="clear:both;"></div>
            </div>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>

<div class="container content" style="padding-bottom:100px;">
    <div style="padding:20px 5px 15px 5px;">
        <button class="btn green">All</button>
        <button class="btn green">Mod</button>
        <button class="btn green">Map</button>
        <button class="btn green">Script</button>
    </div>
    @foreach ($entry as $project)
        <div class="three">
            <div class="panel">
                <div class="panel-img">
                    <div style="height:200px;background:url(http://vertexdezign.net/images/ddd.jpg);background-size:cover;background-position:center center;background-repeat:no-repeat;"></div>
                </div>
                <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                    <h4><a id="{{$project->id}}">{{$project->title}}</a></h4>
                    <p>{!!str_limit($project->desc, 55, "...")!!}</p>
                </div>
                <a href="{{ URL::route('show_projects', $project->id) }}"><button>View</button></a>
            </div>
        </div>
    @endforeach
    <div style="clear:both;"></div>
</div>
@endsection

{{--<ul style="list-style: none;padding:0;">--}}
    {{--<li class="cbp-item" style="float:left;width: 360px; height: 336px; transform: translate3d(0px, 0px, 0px);">--}}
        {{--<div class="cbp-item-wrapper">--}}
            {{--<div class="cbp-item-wrapper">--}}
                {{--<div class="portfolio-dankovteam">--}}
                    {{--<div class="portfolio-image"><img style="height:200px;" src="{{URL('/images/slide.jpg')}}" alt="Paint Drips">--}}
                        {{--<div class="portfolio-hover">--}}
                            {{--<p class="icon-links">--}}
                                {{--<a href="portfolio/project1.html" class="cbp-singlePageInline"><i class="icon-attachment"></i></a>--}}
                                {{--<a href="assets/images/11.jpg" class="cbp-lightbox" data-title="Paint Drips"><i class="icon-magnifying-glass"></i></a>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<h2>Paint Drips</h2>--}}
                    {{--<p>by Jason Travis</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</li>--}}
    {{--<li class="cbp-item" style="float:left;width: 360px; height: 336px; transform: translate3d(0px, 0px, 0px);">--}}
        {{--<div class="cbp-item-wrapper">--}}
            {{--<div class="cbp-item-wrapper">--}}
                {{--<div class="portfolio-dankovteam">--}}
                    {{--<div class="portfolio-image"><img style="height:200px;" src="{{URL('/images/slide.jpg')}}" alt="Paint Drips">--}}
                        {{--<div class="portfolio-hover">--}}
                            {{--<p class="icon-links">--}}
                                {{--<a href="portfolio/project1.html" class="cbp-singlePageInline"><i class="icon-attachment"></i></a>--}}
                                {{--<a href="assets/images/11.jpg" class="cbp-lightbox" data-title="Paint Drips"><i class="icon-magnifying-glass"></i></a>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<h2>Paint Drips</h2>--}}
                    {{--<p>by Jason Travis</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</li>--}}
    {{--<li class="cbp-item" style="float:left;width: 360px; height: 336px; transform: translate3d(0px, 0px, 0px);">--}}
        {{--<div class="cbp-item-wrapper">--}}
            {{--<div class="cbp-item-wrapper">--}}
                {{--<div class="portfolio-dankovteam">--}}
                    {{--<div class="portfolio-image"><img style="height:200px;" src="{{URL('/images/slide.jpg')}}" alt="Paint Drips">--}}
                        {{--<div class="portfolio-hover">--}}
                            {{--<p class="icon-links">--}}
                                {{--<a href="portfolio/project1.html" class="cbp-singlePageInline"><i class="icon-attachment"></i></a>--}}
                                {{--<a href="assets/images/11.jpg" class="cbp-lightbox" data-title="Paint Drips"><i class="icon-magnifying-glass"></i></a>--}}
                            {{--</p>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<h2>Paint Drips</h2>--}}
                    {{--<p>by Jason Travis</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</li>--}}

    {{--<div style="clear:both"></div>--}}
{{--</ul>--}}
