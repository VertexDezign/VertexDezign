@extends('layout.master')

@section('content')
    <div style="color: #444;border-bottom: 1px solid #eee;border-top: 1px solid #eee;">
        <div class="container">
            <div class="two">
                <h1 style="line-height:70px;font-size:23px;font-weight:100;">Downloads</h1>
            </div>
            <div class="two">
                <div class="page-route">
                    <span>You are here: </span><a href="{{URL('/')}}">Home</a> \ Downloads
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
        @foreach ($entry as $download)
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url(http://vertexdezign.net/images/ddd.jpg);background-size:cover;background-position:center center;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4><a id="{{$download->id}}">{{$download->title}}</a></h4>
                        <p>{!!str_limit($download->desc, 55, "...")!!}</p>
                    </div>
                    <a href="{{ URL::route('show_downloads', $download->id) }}"><button>View</button></a>
                </div>
            </div>
        @endforeach
        <div style="clear:both;"></div>
    </div>
@endsection
@endsection
