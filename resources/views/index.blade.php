@extends('layout/master')
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
            <h1>WELCOME TO VERTEXDEZIGN</h1>
        </div>
        <div class="container content" style="padding-top:35px;">
            <div class="three">
                <div style="text-align: center;">
                    <div class="icon">
                        <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/projects')}}}"><img src="{{URL('/images/layout/project.png')}}"/></a></div>
                        <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/projects')}}}">Projects</a></h2>
                        <hr style="width:25%;border-color:#eee;"/>
                    </div>
                    <p>Check out our latest projects.</p>
                </div>
            </div>
            <div class="three">
                <div style="text-align: center;">
                    <div class="icon">
                        <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/downloads')}}}"><img src="{{URL('/images/layout/download.png')}}"/></a></div>
                        <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/downloads')}}}">Downloads</a></h2>
                        <hr style="width:25%;border-color:#eee;"/>
                    </div>
                    <p>Get our latest mods here.</p>
                </div>
            </div>
            <div class="three">
                <div style="text-align: center;">
                    <div class="icon">
                        <div class="round green" style="width:100px;height:100px;line-height:150px;"><a href="{{{URL('/about')}}}"><img src="{{URL('/images/layout/people.png')}}"/></a></div>
                        <h2><a style="padding-top:5px;display:inline-block;color: inherit;" href="{{{URL('/about')}}}">About us</a></h2>
                        <hr style="width:25%;border-color:#eee;"/>
                    </div>
                    <p>Curious what makes VertexDezign?</p>
                </div>
            </div>
        </div>
        <div style="clear:both;height:35px;"></div>
    </section>
    <div style="background:#f7f7f7;padding-top:100px;">
        <div class="container-max">
            @foreach($newsEntry as $news)
                <div class="two-item" style="text-align:center;padding:1px;height:500px;">
                    <a href="{{ URL::route('show_news', $news->id) }}">
                        <div class="articlePanel" style="height:100%;background:url({{URL('/media', $news->imgsrc)}}) center center;background-size:cover;background-position:center center;background-repeat:no-repeat;">
                            <div class="content">
                                <h1>{{$news->title}}</h1>
                                <hr>
                                <p class="author">Posted on {{ date("d m Y",strtotime($news->created_at)) }} by {{$news->getAuthor->username}}</p>
                                <p>{!! $news->body !!}</p>
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
    <section style="margin-top:100px;">
        <div class="four" >
            <div style="text-align: left;padding:10px;">
                <h2>PARTNERS</h2>
                <p>We do like to share experience with others. Lorem dipsum folor margade sitede lametep eiusmod psumquis dolore.</p>
            </div>
        </div>
        <div>
            <div class="four" style="text-align:center;height:200px;">
                <a href="http://www.bm-modding.de/">
                    <div class="articlePanel" style="height:100%;width:100%;background:url(http://www.bm-modding.de/wp-content/textbanner/logo.png) center center;background-size:auto;background-position:center center;background-repeat:no-repeat;">
                        <div class="overlay"></div>
                    </div>
                </a>
            </div>
            <div class="four" style="text-align:center;height:200px;">
                <a href="http://www.modswanted.com/">
                    <div class="articlePanel" style="height:100%;background:url(http://www.modswanted.com/assets/images/mw_logo.png) center center;background-size:auto;background-position:center center;background-repeat:no-repeat;">
                        <div class="overlay"></div>
                    </div>
                </a>
            </div>
            <div class="four" style="text-align:center;height:200px;">
                <a href="http://www.bm-modding.de/">
                    <div class="articlePanel" style="height:100%;background:url(http://www.oebmodding.co.uk/wp-content/uploads/OEB_Modding_Logo.png) center center;background-size:auto;background-position:center center;background-repeat:no-repeat;">
                        <div class="overlay"></div>
                    </div>
                </a>
            </div>

            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
    </section>
@endsection