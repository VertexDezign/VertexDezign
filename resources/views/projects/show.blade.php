@extends('layout/master')

@section('content')
    <div style="color: #444;border-bottom: 1px solid #eee;border-top: 1px solid #eee;">
        <div class="container">
            <div class="two">
                <h1 style="line-height:70px;font-size:23px;font-weight:100;">{{$entry->title}}</h1>
            </div>
            <div class="two">
                <div class="page-route">
                    <span>Category: </span>{{$entry->category}}
                    <div style="clear:both;"></div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div class='container content'>
        <div class="" style="!important;text-align:left;">
            <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">Description</h4>
            <div style="margin:10px;">
                {!!$entry->desc!!}
            </div>
        </div>
        <div>
            <div class="three">
                <div class="panel-body" style="!important;text-align:left;">
                    <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">Information</h4>
                    {!! $entry->info !!}
                </div>
            </div>
            <div class="three">
                <div class="panel-body" style="!important;text-align:left;">
                    <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">Credits</h4>
                    {!! $entry->credits !!}
                </div>
            </div>
            <div class="three">
                <div class="panel-body" style="!important;text-align:left;">
                    <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">Features</h4>
                    {!! $entry->features !!}
                </div>
            </div>
            <div style="clear:both;"></div>
            <div>
                <div class="" style="!important;text-align:left;">
                    <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">Images</h4>
                    @if(isset($entry->images))
                        {{--Foreach on images--}}
                        <div style="margin:5px;">
                            <img src="{{$entry->images}}" />
                        </div>
                    @endif
                    <div style="margin:5px;">
                        <img style="height:150px;" src="http://vertexdezign.net/images/ddd.jpg" />
                    </div>
                </div>
            </div>
            @if($entry->log != '')
            <div>
                <div class="" style="!important;text-align:left;">
                    <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">Change log</h4>
                    <div style="margin:10px;">
                        {!! $entry->log !!}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection