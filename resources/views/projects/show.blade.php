@extends('layout/master')
@section('title', $entry->title)
@section('description', 'This is the project page of VertexDezign')
@section('content')
    <script type="text/javascript">
        $(document).ready(function() {
            $("a.image").fancybox({
                'padding'       : 0,
                'width'         : 600,
                'height'        : 250,
                'autoScale'     : false});
        });
    </script>
    <?php $images = array_filter(explode(';', $entry['images'])); $header = array_values($images)[0] ?>
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
    <header style="background:url({{URL('/media/', $header)}}) center center;background-size:cover;position:relative;background-repeat:no-repeat;"></header>
    <div class='container content' style="margin-bottom:50px;">
        <div class="" style="padding-top:10px;text-align:left;">
            {!!$entry->desc!!}
        </div>
        <div>
            <div class="three">
                <div class="panel-body" style="text-align:left;background:#f7f7f7;padding-bottom:5px;margin:5px;border-bottom:2px solid #ccc;box-shadow:0 0 8px rgba(0, 0, 0, 0.1);">
                    <h4 style="padding:10px;background-color:#2D8633;color:#fff;">Information</h4>
                    {!! $entry->info !!}
                </div>
            </div>
            <div class="three">
                <div class="panel-body" style="text-align:left;background:#f7f7f7;padding-bottom:5px;margin:5px;border-bottom:2px solid #ccc;box-shadow:0 0 8px rgba(0, 0, 0, 0.1);">
                    <h4 style="padding:10px;background-color:#2D8633;color:#fff;">Credits</h4>
                    {!! $entry->credits !!}
                </div>
            </div>
            <div class="three">
                <div class="panel-body" style="text-align:left;background:#f7f7f7;padding-bottom:5px;margin:5px;border-bottom:2px solid #ccc;box-shadow:0 0 8px rgba(0, 0, 0, 0.1);">
                    <h4 style="padding:10px;background-color:#2D8633;color:#fff;">Features</h4>
                    {!! $entry->features !!}
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div>
            <div style="!important;text-align:left;background:#f7f7f7;margin:5px;border-bottom:2px solid #ccc;box-shadow:0 0 8px rgba(0, 0, 0, 0.1);">
                <h4 style="padding:10px;margin:0px;background-color:#2D8633;color:#fff;">Images</h4>
                <div style="padding:5px;">
                    @if(isset($entry->images))
                        <?php $images = array_filter(explode(';', $entry['images'])); ?>
                        @foreach(array_chunk($images, 3) as $row)
                            <div>
                            @foreach($row as $image)
                                <div style="margin:2px;width:calc(33.3333333333% - 4px);float:left;">
                                    <a class="image" rel="group" style="width:100%;width:100%;" href="{{URL('/media/' . $image)}}">
                                        <img style="width:100%;width:100%;" src="{{URL('/media/' . $image)}}" alt="" />
                                        <div class="overlay"></div>
                                    </a>
                                </div>
                            @endforeach
                            </div>
                            <div style="clear:both;"></div>
                        @endforeach
                    @endif
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
@endsection