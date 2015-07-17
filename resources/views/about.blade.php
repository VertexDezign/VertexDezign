@extends('layout/master')
<head>
    <title>About - VertexDezign</title>
</head>
@section('content')
    <div style="color: #444;border-bottom: 1px solid #eee;border-top: 1px solid #eee;">
        <div class="container">
            <div class="two">
                <h1 style="line-height:70px;font-size:23px;font-weight:100;">About us</h1>
            </div>
            <div class="two">
                <div class="page-route">
                    <span>You are here: </span><a href="{{URL('/')}}">Home</a> \ About
                    <div style="clear:both;"></div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
        <div class='container content'>
        <div>
            <div>
                <div class="" style="!important;text-align:left;">
                    <div style="margin:5px;">
                       <p>
                           Welcom to VertexDezign. Our team is working on 3d models for over 5 years now. You can find our references on GIANTS ModHub and other pages for Farming Simulator.
                       </p>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <div class="" style="!important;text-align:left;">
                    <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">Our team</h4>
                </div>
            </div>
        </div>
        <section>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/media/lyHKTmjLkk.png')}}) center center;background-size:cover;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Wopster</h4>
                        <p>Model/Ingame/Script</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/people.png')}}) center center;background-size:cover;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Xentro</h4>
                        <p>Model/Texture/Ingame/Script</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/people.png')}}) center center;background-size:cover;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Grisu118</h4>
                        <p>Ingame/Script</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/people.png')}}) center center;background-size:cover;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Niggels939</h4>
                        <p>Texture/Map</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/people.png')}}) center center;background-size:cover;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Eicher-Fan</h4>
                        <p>Forum moderator</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/people.png')}}) center center;background-size:cover;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Fox!</h4>
                        <p>Forum moderator</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/people.png')}}) center center;background-size:cover;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Srgtsmokealot</h4>
                        <p>Forum moderator</p>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </section>
    </div>
@endsection