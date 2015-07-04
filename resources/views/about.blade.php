@extends('layout/master')

@section('content')
    <header style="height:50px;"></header>
    <div class='container content'>
        <h2>VertexDezign</h2>
        <hr style="color:#ccc;"/>
        <div>
            <div>
                <div class="" style="!important;text-align:left;">
                    <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">About us</h4>
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
            <div class="container content" style="padding-top:35px;">
                <div class="three">
                    <div style="text-align: center;">
                        <div class="icon">
                            <div class="round lightgrey" style="width:150px;height:150px;line-height:200px;"><a href="{{{URL('/about')}}}"><img src="{{URL('/images/layout/people.png')}}"/></a></div>
                            <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/about')}}}">Wopster</a></h2>
                        </div>
                        <p>Model/Ingame/Script</p>
                    </div>
                </div>
                <div class="three">
                    <div style="text-align: center;">
                        <div class="icon">
                            <div class="round lightgrey" style="width:150px;height:150px;line-height:200px;"><a href="{{{URL('/about')}}}"><img src="{{URL('/images/layout/people.png')}}"/></a></div>
                            <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/about')}}}">Xentro</a></h2>
                        </div>
                        <p>Model/Texture/Ingame/Script</p>
                    </div>
                </div>
                <div class="three">
                    <div style="text-align: center;">
                        <div class="icon">
                            <div class="round lightgrey" style="width:150px;height:150px;line-height:200px;"><a href="{{{URL('/about')}}}"><img src="{{URL('/images/layout/people.png')}}"/></a></div>
                            <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/about')}}}">Grisu118</a></h2>
                        </div>
                        <p>Ingame/Script</p>
                    </div>
                </div>
            </div>
            <div style="clear:both;height:35px;"></div>
        </section>
    </div>
@endsection