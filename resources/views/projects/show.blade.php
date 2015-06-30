@extends('layout/master')

@section('content')
    <header style="height:50px;"></header>
    <div class='container content'>
        <h2>{{$entry->title}}</h2>
        <hr style="color:#ccc;"/>
        <div style="margin:5px;">
            <p style="float:left;color:#aaa;">Created at {{ date("d M Y",strtotime($entry->created_at)) }}</p>
            <p style="float:right;color:#aaa;">Category: {{$entry->category}}</p>
            <div style="clear:both;"></div>
            <p>{!!$entry->desc!!}</p>
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
                    {!! $entry->info !!}
                </div>
            </div>
            <div class="three">
                <div class="panel-body" style="!important;text-align:left;">
                    <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">Features</h4>
                    {!! $entry->info !!}
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
            <div>
                <div class="" style="!important;text-align:left;">
                    <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">Change log</h4>
                    <div style="margin:10px;">
                        {!! $entry->log !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection