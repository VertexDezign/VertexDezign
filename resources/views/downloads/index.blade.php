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
            <form method="post" role="post" action="{{route('filter_downloads')}}">
                <input type="submit" value="All" name="filter" />
                <input type="submit" value="Mods" name="filter" />
                <input type="submit" value="Maps" name="filter" />
                <input type="submit" value="Scripts" name="filter" />
                <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            </form>
        </div>
        @if($entry->isEmpty())
            <h1 style="line-height:70px;font-size:23px;font-weight:100;">There's currently nothing to show here...</h1>
        @else
            @foreach ($entry as $download)
                <?php $images = array_filter(explode(';', $download['images'])); $header = array_values($images)[0]; ?>
                <div class="three">
                    <div class="panel">
                        <div class="panel-img">
                            <div style="height:200px;background:url({{URL('/media', $header)}}) center center;background-size:cover;background-repeat:no-repeat;"></div>
                        </div>
                        <div class="panel-body" style="padding:5px;padding-bottom:5px;">
                            <h4><a id="{{$download->id}}">{{$download->title}}</a></h4>
                            <p>{!!str_limit($download->desc, 55, "...")!!}</p>
                        </div>
                        <a href="{{ URL::route('show_downloads', $download->id) }}"><button>View</button></a>
                    </div>
                </div>
            @endforeach
        @endif
        <div style="clear:both;"></div>
    </div>
@endsection
@endsection
