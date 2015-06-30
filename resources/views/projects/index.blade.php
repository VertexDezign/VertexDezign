@extends('layout.master')

@section('content')
<div class="container content">
    <div style="margin-top:25px;">
        @foreach ($entry as $project)
        <div class="three">
            <div class="panel" style="!important;text-align:left;">
                <div style="height:200px;background:url(http://vertexdezign.net/images/ddd.jpg);background-size:cover;background-position:center center;background-repeat:no-repeat;"></div>
                <div style="padding:15px;padding-bottom:5px;">
                    <h4><a id="{{$project->id}}">{{$project->title}}</a></h4>
                    <p>{!!str_limit($project->desc, 55, "...")!!}</p>
                </div>
                <a href="{{ URL::route('show_projects', $project->id) }}"><button>View</button></a>
            </div>
        </div>
        @endforeach
    </div>
    <div style="clear:both;height:35px;"></div>
</div>
@endsection
