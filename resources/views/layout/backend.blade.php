<?php
use App\Project;
use App\News;
?>
<!DOCTYPE html>
<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script type="text/javascript" src="{{asset('/source/jquery.fancybox.pack.js')}}"></script>
    <link href="{{ asset('/css/backend.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/source/jquery.fancybox.css')}}" media="screen" />
    <script>
        $(document).ready(function() {
            $("a.image").fancybox({
                'padding'       : 0,
                'width'         : 600,
                'height'        : 250,
                'autoScale'     : false});
        });

        function openModal(id){
            $( "#" + id ).animate({bottom: '0'});
        }
        function closeModal(id){
            element = $( "#" + id);
            element.animate({bottom: '-'+(element.height()+25)+'px'});
        }

        $(window).load(function () {
            $( "#message").animate({bottom: '0'},{duration:1000});
            $( "#message" ).delay(2000).animate({bottom: '-125px'},{duration:1000});
        });

        function changeImage(value) {
            $('.imageview').attr('src', '{{Url('/media')}}/' + value).fadeIn();
        }
        function addImage() {
            var src = $("#imageselect").val();
            $('#imageview').attr('src', '{{Url('/media')}}/' + src).fadeIn();
        }

        var toggleMenuTimer = false;
        function toggleMenu(id){
            element = $( "#" + id );
            if(element.css('opacity')=='0'){
                if(toggleMenuTimer==false){
                    element.css('display', 'block')
                            .animate({opacity: 1, marginTop: '-5px'});
                }
            }else{
                timer = toggleMenuTimer;
                element.animate({opacity: 0, marginTop: '5px'});
                element.delay(500).ready(function(){
                    $(this).css('display', 'none');
                    timer = toggleMenuTimer;
                });
            }
        }
        function toggleSideMenu(){
            element = $('nav');
            container = $('.container');
            if(element.css('marginLeft')=='-200px'){
                element.animate({marginLeft: '0'});
                container.animate({'left': '200px'});
            }else{
                element.animate({marginLeft: '-200px'});
                container.animate({'left': '0'});
            }
            console.log('finished');
        }

        //Media Functions:
        function cutLastSlash(path) {
            if (endsWith(path, '/')) {
                path = path.substring(0, path.length);
            }
        }

        function endsWith(str, suffix) {
            return str.indexOf(suffix, str.length - suffix.length) !== -1;
        }

        function folderUp() {
            var path = mediaSelector.path;
            cutLastSlash(path);
            var includesSlash = false;
            if (typeof(path.includes) == "function") {
                includesSlash = path.includes('/'); //Chrome
            } else {
                includesSlash = path.contains('/'); //Firefox
            }

            if (includesSlash) {
                path = path.substring(0, path.lastIndexOf("/"));
            } else {
                path = mediaSelector.defaultpath;
            }
            mediaSelector.path = path;
            refreshMediaSelector();
        }

        var mediaSelector = {
            div : null,
            input : null,
            loc : null,
            arrowUp : null,
            table : null,
            tbody: null,

            closeCallback : function() {},

            path : "media",
            defaultpath : "media"
        };

        function refreshMediaSelector() {
            mediaSelector.loc.val(mediaSelector.path);
            $.get('../media/getfolder', {folder: mediaSelector.path} ,function(data, textstatus, xhr) {
                if (textstatus == 'success') {
                    mediaSelector.tbody.empty();
                    $.each(data, function(i, e) {
                        var tr = $('<tr>');
                        var text;
                        tr.css('user-select', 'none');
                        tr.css('cursor', 'pointer');
                        tr.addClass('highlight');
                        tr.attr('name', e[0]);
                        if (e[1]) {
                            tr.dblclick(function(e){
                                cutLastSlash(mediaSelector.path);
                                mediaSelector.path += '/' + $(this).attr('name');
                                mediaSelector.loc.val(mediaSelector.path);
                                refreshMediaSelector();
                            });
                            text = '<img src="../../images/backend/folder.png">';
                        } else {
                            tr.dblclick(function(e){
                                mediaSelector.input.val(mediaSelector.path + '/' + $(this).attr('name'));
                                mediaSelector.closeCallback();
                            });
                            tr.click(function(e){
                                $('.imageview').attr('src', '../../' + mediaSelector.path + '/' + $(this).attr('name'));
                            });
                            text = '<img src="../../images/backend/file.png">';
                        }
                        tr.append($('<td style="width: 20px;">' + text + '</td>'));
                        tr.append($('<td>' + e[0] + '</td>'));
                        mediaSelector.tbody.append(tr);
                    });
                }
            });

            if(mediaSelector.path == mediaSelector.defaultpath) {
                $('#dirUp').hide();
            } else {
                $('#dirUp').show();
            }
        }

        function createMediaSelector(divId, inputId, closeCallback) {
            mediaSelector.closeCallback = closeCallback;
            mediaSelector.div = $('#' + divId);
            mediaSelector.input = $('#' + inputId);
            var arrowUp = '{{URL("/images/backend/arrowup.png")}}';
            mediaSelector.loc = $('<input type="text" id="path" value="" readonly style="width: 80%">');
            mediaSelector.arrowUp = $('<img alt="Directory Up" id="dirUp" onclick="folderUp()" src="' + arrowUp + '">');
            mediaSelector.table = $('<table class="tbl" style="color: black;"><thead><th style="width: 20px;"></th><th>Name</th></thead></table>');
            mediaSelector.tbody = $('<tbody></tbody>');
            mediaSelector.table.append(mediaSelector.tbody);
            refreshMediaSelector();
            mediaSelector.div.empty().append(mediaSelector.loc).append(mediaSelector.arrowUp).append(mediaSelector.table);
        }
    </script>
</head>
<body>
<nav>
    <div style="height:60px;background-color:#0AA699;">
        <a href="{{URL('/backend/')}}"><h1><span>Vertex</span>backend</h1></a>
    </div>
    <ul id="menu" style="list-style:none;height:100%;">
        <li><a href="{{URL('/backend/')}}"><img src="{{URL('/images/backend/menu/dashboard.png')}}"/><p>Dashboard</p></a></li>
        <li><a href="{{URL('/backend/news')}}"><img src="{{URL('/images/backend/menu/partners.png')}}"/><p>WIP</p></a></li>
        <li><a href="{{URL('/backend/news')}}"><img src="{{URL('/images/backend/menu/partners.png')}}"/><p>Todo's</p></a></li>
        @if($permission == 'admin')
        <li>
            <a href="{{URL('/backend/news')}}"><img src="{{URL('/images/backend/menu/news.png')}}"/><p>News</p></a>
        </li>
        <li>
            <a href="{{URL('/backend/projects')}}"><img src="{{URL('/images/backend/menu/projects.png')}}"/><p>Projects</p></a>
        </li>
        <li>
            <a href="{{URL('/backend/downloads')}}"><img src="{{URL('/images/backend/menu/downloads.png')}}"/><p>Downloads</p></a>
        </li>
        <li>
            <a href="{{URL('/backend/media')}}"><img src="{{URL('/images/backend/menu/media.png')}}"/><p>Media</p></a>
        </li>
        <li>
            <a href="{{URL('/backend/slider')}}"><img src="{{URL('/images/backend/menu/media.png')}}"/><p>Slider</p></a>
        </li>
        <li>
            <a href="{{URL('/backend/partner')}}"><img src="{{URL('/images/backend/menu/media.png')}}"/><p>Partner</p></a>
        </li>
        @endif
    </ul>
</nav>
<div class="container">
    <header>
        <button onclick="toggleSideMenu()"><img src="{{URL('/images/backend/menu-alt.png')}}" /></button>
        <button onclick="window.location.href='{{URL('/')}}'"><img src="{{URL('/images/backend/home.png')}}" /></button>
        <img src="{{URL('/images/backend/search.png')}}" class="search-icon"/>
        <input type="search" placeholder="Search in admin panel" />
        <button style="float:right;margin-right:5px;" class="rotate" onclick="toggleMenu('settings-menu');"><img src="{{URL('/images/backend/settings.png')}}" /></button>
        <button style="float:right;margin-right:5px;"><img src="{{URL('/images/backend/bell.png')}}" /></button>
        <ul class="dropdown" id="settings-menu">
            <li><a>My Account</a></li>
            <li><a>Settings</a></li>
            <li style="border-top:1px solid #e4e4e4;"><a href="{{URL('/logout')}}">Logout</a></li>
        </ul>

        <?php
        echo '<a style="float:right;margin-top:20px;margin-right:5px;">'.Auth::user()->firstname . ' <strong>' . Auth::user()->surname.'</strong></a>';
        ?>

    </header>
    @yield('content')
</div>
</body>
</html>