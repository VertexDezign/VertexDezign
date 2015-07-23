@extends('layout/master')
@section('title', 'Home')
@section('description', 'This is the home page of VertexDezign')
@section('content')
    <script>
        $(document).ready(function(){
            $('.banner').unslider({
                speed: 1000,
                delay: 7000,
                complete: function() {},  //  A function that gets called after every slide animation
                dots: true,
                fluid: true
            });
        });
    </script>
    <div class="banner has-dots" style="overflow:hidden;">
        <ul>
            @foreach($sliderEntry as $slide)
                <li style="background:url({{URL('/media', $slide->image)}}); background-size:cover;position:relative;background-position:center center;background-repeat:no-repeat;">
                    <h1>{{$slide->title}}</h1>
                    <p>{!!$slide->desc!!}</p>
                    <a href="{{{URL('/', $slide->link)}}}" class="btn">Check out!</a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="container">
        <div class="arrow"></div>
    </div>
    <section style="margin-top:100px;">
        <div class="container content" style="text-align: center;">
            <h1 style="color:#404040;font-weight:300;">WELCOME TO VERTEXDEZIGN</h1>
        </div>
        <div class="container content" style="padding-top:35px;">
            <div class="three">
                <div style="text-align: center;">
                    <div class="icon">
                        <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/projects')}}}"><img src="{{URL('/images/layout/project.png')}}"/></a></div>
                        <h2 style="font-size:24px;font-weight:300;color:#404040;"><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/projects')}}}">Projects</a></h2>
                        <hr style="width:25%;border-color:#eee;"/>
                    </div>
                    <p>Check out our latest projects.</p>
                </div>
            </div>
            <div class="three">
                <div style="text-align: center;">
                    <div class="icon">
                        <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/downloads')}}}"><img src="{{URL('/images/layout/download.png')}}"/></a></div>
                        <h2 style="font-size:24px;font-weight:300;color:#404040;"><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/downloads')}}}">Downloads</a></h2>
                        <hr style="width:25%;border-color:#eee;"/>
                    </div>
                    <p>Get our latest mods here.</p>
                </div>
            </div>
            <div class="three">
                <div style="text-align: center;">
                    <div class="icon">
                        <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/about')}}}"><img src="{{URL('/images/layout/people.png')}}"/></a></div>
                        <h2 style="font-size:24px;font-weight:300;color:#404040;"><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/about')}}}">About us</a></h2>
                        <hr style="width:25%;border-color:#eee;"/>
                    </div>
                    <p>Curious what makes VertexDezign?</p>
                </div>
            </div>
        </div>
        <div style="clear:both;height:35px;"></div>
    </section>
    <section style="background:#f7f7f7;padding-top:50px;padding-bottom:50px;">
        <div class="container">
            <div class="row" style="">
                <div class="two">
                    <h1 style="color:#404040;font-weight:300;">DONATIONS</h1>
                    <p style="color:#404040;font-weight:300;">We do like to share our mods with others. But to maintain our website and forum we always could use some support.</p>
                </div>
                <div class="two">
                    <button style="padding:25px 50px;line-height:0px;" class="btn green"><a href="">Donate</a></button>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    </section>
    <div style="padding-top:100px;">
        <div class="container-max">
            @foreach($newsEntry as $news)
                <div class="two-item" style="text-align:center;padding:1px;height:500px;">
                    <a href="{{ URL::route('show_news', $news->id) }}">
                        <div class="articlePanel" style="height:100%;background:url({{URL('/media', $news->imgsrc)}}) center center;background-size:cover;background-position:center center;background-repeat:no-repeat;">
                            <div class="content">
                                <h1>{{$news->title}}</h1>
                                <hr>
                                <p class="author">Posted on {{ date("d m Y",strtotime($news->created_at)) }} by {{$news->getAuthor->username}}</p>
                            </div>
                            <div class="overlay"></div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div style="clear:both;"></div>
            @if($newsEntry->render())
                <div style="text-align:center;">
                    <?php echo $newsEntry->render(); ?>
                </div>
            @else
                <div style="margin-bottom:100px;"></div>
            @endif
        </div>
    </div>
    <section style="background:#f7f7f7;padding-top:50px;padding-bottom:50px;">
        <div class="container">
            <div style="text-align: center;padding:10px;">
                <h1 style="color:#404040;font-weight:300;">PARTNERS</h1>
                <p style="font-weight:300;">We do like to share experience with others. Lorem dipsum folor margade sitede lametep eiusmod psumquis dolore.</p>
            </div>
        </div>
        <div>
            @foreach($partnerEntry as $partner)
                <div class="three" style="text-align:center;height:200px;">
                    <a target="_blank" href="{{URL($partner->link)}}">
                        <div class="articlePanel" style="height:100%;width:100%;background:url({{URL::asset('media/' . $partner->image)}}) center center;background-size:auto;background-position:center center;background-repeat:no-repeat;">
                            <div class="overlay"></div>
                        </div>
                    </a>
                </div>
            @endforeach
            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
    </section>
@endsection