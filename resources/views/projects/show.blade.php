@extends('layout/master')

@section('content')
    <div style="color: #444;border-bottom: 1px solid #eee;border-top: 1px solid #eee;">
        <div class="container">
            <div class="two">
                <h1 style="line-height:70px;font-size:23px;font-weight:100;">{{$entry->title}}</h1>
            </div>
            <div class="two">
                <div class="page-route">
                    <span>Category: </span>
                    @if($entry['category'] == 1)
                        Steerable
                    @elseif($entry['category'] == 2)
                        Tools
                    @elseif($entry['category'] == 3)
                        Trailers
                    @elseif($entry['category'] == 4)
                        Maps
                    @elseif($entry['category'] == 5)
                        Objects
                    @elseif($entry['category'] == 6)
                        Scripts
                    @elseif($entry['category'] == 7)
                        Others
                    @endif
                    <div style="clear:both;"></div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <header style="background:url(http://vertexdezign.net/images/ggg.jpg) center center;"></header>
    <div class='container content'>
        <div class="" style="!important;text-align:left;">
            {!!$entry->desc!!}
        </div>
        <div>
            <div class="three">
                <div class="panel-body" style="!important;text-align:left;background:#f7f7f7;padding-bottom:5px;margin:5px;">
                    <h4 style="height:15px;padding:10px;background-color:#2D8633;color:#fff;">Information</h4>
                    {!! $entry->info !!}
                </div>
            </div>
            <div class="three">
                <div class="panel-body" style="!important;text-align:left;background:#f7f7f7;padding-bottom:5px;margin:5px;">
                    <h4 style="height:15px;padding:10px;background-color:#2D8633;color:#fff;">Credits</h4>
                    {!! $entry->credits !!}
                </div>
            </div>
            <div class="three">
                <div class="panel-body" style="!important;text-align:left;background:#f7f7f7;padding-bottom:5px;margin:5px;">
                    <h4 style="height:15px;padding:10px;background-color:#2D8633;color:#fff;">Features</h4>
                    {!! $entry->features !!}
                </div>
            </div>
            <div style="clear:both;"></div>
            <div>
                <div class="" style="!important;text-align:left;">
                    <h4 style="height:15px;margin:5px;padding:10px;background-color:#2D8633;color:#fff;">Images</h4>
                    @if(isset($entry->images))
                        {{--Foreach on images--}}
                        <?php
                            $images = str_split($entry->images);
                            foreach($images as $image){
                                echo "test";
                            }
                        ?>
                        <div style="margin:5px;">
                            <img style="height:150px;" src="{{URL('/media', substr(strrchr($entry->images, ';'), 1))}}" />
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