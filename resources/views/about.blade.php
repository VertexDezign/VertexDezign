@extends('layout/master')
@section('title', 'About')
@section('description', 'This is the about page of VertexDezign')
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
                        <p>Welcom to VertexDezign!</p>
                        <p>Our team is working on 3d models for over 5 years now. You can find our references on GIANTS ModHub and other pages for Farming Simulator.</p>
                        <p>Any (permission) questions email to: <a href="mailto:info@vertexdezign.net">info@vertexdezign.net</a></p>
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
        <section style="margin-bottom:50px;">
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members/grisu118.png')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Grisu118</h4>
                        <p>Admin</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members.png')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Eicher-Fan</h4>
                        <p>Co-Admin</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members/niggels.png')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Niggels939</h4>
                        <p>Leader ModTeam</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members.png')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
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
                        <div style="height:200px;background:url({{URL('/images/layout/members/steffen30muc.jpg')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Steffen30muc</h4>
                        <p>Modding, Texturing</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members.png')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>John Deere 6930</h4>
                        <p>Modelling, Ingaming, Scripting</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members.png')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>L4Icce</h4>
                        <p>Modelling, Texturing</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members/katsuo.png')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Katsuo</h4>
                        <p>Modelling, Texturing, Mapping</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members/K3MN1K.jpg')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>K3MN1K</h4>
                        <p>Modelling, Video Guru</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members.png')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>GeneralX©</h4>
                        <p>Modding</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members.png')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>fqC.Art</h4>
                        <p>Modelling, Texturing</p>
                    </div>
                </div>
            </div>
            <div class="three">
                <div class="panel">
                    <div class="panel-img">
                        <div style="height:200px;background:url({{URL('/images/layout/members/deelerz.png')}}) center center;background-size:auto;background-repeat:no-repeat;"></div>
                    </div>
                    <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                        <h4>Deelerz</h4>
                        <p>Modelling, Ingaming</p>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </section>
    </div>
@endsection