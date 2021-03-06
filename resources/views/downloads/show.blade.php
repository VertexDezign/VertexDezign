@extends('layout/master')
@section('title', $entry->title)
@section('description', 'This is the download page of VertexDezign')
@section('content')
    <script type="text/javascript">
        $(document).ready(function() {
            $("a.image").fancybox({
                'padding'       : 0,
                'width'         : 600,
                'height'        : 250,
                'autoScale'     : false,

                helpers: {
                    overlay: {
                        locked: false
                    }
                }});
        });
    </script>
    <?php $images = \App\Media::getFiles("media/" . $entry['images']); $header = $images->getPath() . "/" . $images->getFilename();
    foreach ($images as $img) {
        if (\App\Media::checkIfImage($img->getPath() . "/" . $img->getFilename())) {
            $header = $img->getPath() . "/" . $img->getFilename();
            break;
        }
    } ?>
    <div style="color: #444;border-bottom: 1px solid #eee;border-top: 1px solid #eee;">
        <div class="container">
            <div class="two">
                <h1 style="line-height:70px;font-size:23px;font-weight:100;">{{$entry->title}}</h1>
            </div>
            <div class="two">
                <div class="page-route">
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
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <header style="background:url({{URL::asset('/'. $header)}}) center center;background-size:cover;position:relative;background-repeat:no-repeat;"></header>
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
        @if($entry->log != '')
            <div>
                <div style="!important;text-align:left;background:#f7f7f7;margin:5px;border-bottom:2px solid #ccc;box-shadow:0 0 8px rgba(0, 0, 0, 0.1);">
                    <h4 style="padding:10px;background-color:#2D8633;color:#fff;">Change log</h4>
                    <div style="margin:10px;">
                        {!! $entry->log !!}
                    </div>
                </div>
            </div>
        @endif
        <div>
            <div style="!important;text-align:left;background:#f7f7f7;margin:5px;border-bottom:2px solid #ccc;box-shadow:0 0 8px rgba(0, 0, 0, 0.1);">
                <h4 style="padding:10px;background-color:#2D8633;color:#fff;">Images</h4>
                <div style="padding:5px;">
                    @if(isset($entry->images))
                        <?php $images = \App\Media::getFiles("media/" . $entry['images']);
                        $c = 0;
                        foreach($images as $image) {
                            if (\App\Media::checkIfImage($image->getPath() . '/' . $image->getFilename())) {
                                if ($c == 0) {
                                    echo '<div>';
                                }
                                ?>
                                <div style="margin:2px;width:calc(33.3333333333% - 4px);float:left;">
                                    <a class="image" style="width:100%;width:100%;" rel="group"
                                       href="{{URL::asset('/' . $image->getPath() . '/' . $image->getFilename())}}">
                                        <img style="width:100%;width:100%;"
                                             src="{{URL::asset('/' . $image->getPath() . '/' . $image->getFilename())}}"/>

                                        <div class="overlay"></div>
                                    </a>
                                </div>
                                <?php
                                if (++$c >= 3) {
                                    echo '</div>';
                                    echo '<div style="clear:both;"></div>';
                                    $c = 0;
                                }
                            }
                        }
                        if ($c < 3 && $c > 0) {
                            echo '</div>';
                            echo '<div style="clear:both;"></div>';
                        }
                        ?>
                    @endif
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div>
            <div style="!important;text-align:left;background:#f7f7f7;margin:5px;border-bottom:2px solid #ccc;box-shadow:0 0 8px rgba(0, 0, 0, 0.1);">
                <h4 style="padding:10px;background-color:#2D8633;color:#fff;">Download</h4>
                <div style="margin:10px;">
                    <div style="float:left;">
                        <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=8PP88DY4UMFME"><button class="btn green">Donate</button></a>
                        @if (isset($entry['download']) && $entry['download'] != "")
                            <a href="{{URL('/media/' . $entry['download'])}}"><button class="btn green">Download</button></a>
                        @endif
                        @if(isset($entry['downloadExtern']) && $entry['downloadExtern'] != "")
                            <a href="{{URL($entry['downloadExtern'])}}"><button class="btn green">Extern download</button></a>
                        @endif
                    </div>
                    <div style="float:right;">
                        <div id="ratingDiv" class="rating" style="float:left;">
                            <span class="star_1 ratingsStars">☆</span><span class="star_2 ratingsStars">☆</span><span class="star_3 ratingsStars">☆</span><span class="star_4 ratingsStars">☆</span><span class="star_5 ratingsStars">☆</span>
                        </div>
                        <p id="testInfo"></p>
                        <div style="clear:both;"></div>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
            var avg = {{App\Rating::getAvg($entry->id)}};
        function setVotes(widget, data) {

            if (data && data.avg) {
                avg = data.avg;
            }
            avg = Math.round(avg);
            $(widget).find('.star_' + avg).prevAll().andSelf().addClass('ratingsVote');
            $(widget).find('.star_' + avg).nextAll().removeClass('ratingsVote');
        }

        $(document).ready(function() {
            setVotes($('#ratingDiv'));

            $.get('{{URL("/forum/SessionAPI.php")}}', null, function(data){
                if (data) {
                    if (data.uId && data.uId <= 0) {
                        $('#rateButton').hide();
                        $('.ratingsStars').attr('title', 'You have to be loggedin the forum!');
                    } else {
                        $('.ratingsStars').hover(
                            // Handles the mouseover
                            function() {
                                $(this).prevAll().andSelf().addClass('ratingsOver');
                                $(this).nextAll().removeClass('ratingsVote');
                            },
                            // Handles the mouseout
                            function() {
                                $(this).prevAll().andSelf().removeClass('ratingsOver');
                                setVotes($(this).parent());
                            }
                        ).click(function() {
                                var star = this;
                                var widget = $(this).parent();
                                var clickedData = {
                                    clickedOn : $(star).attr('class'),
                                    widgetId : {{$entry->id}},
                                    wbbUId : data.uId,
                                    _token : "{{csrf_token()}}"

                                };
                                $.post(
                                    "{{URL::route('rate_downloads', array('id'=>$entry->id))}}",
                                    clickedData,
                                    function(data) {
                                        setVotes(widget, data);
                                    },
                                    'json'
                                );
                            }).css('cursor', 'pointer');
                    }
                }
            });
        });

    </script>
@endsection