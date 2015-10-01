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
                <li><a href="{{URL('/backend/users')}}"><img src="{{URL('/images/backend/menu/news.png')}}"/><p>Users</p></a></li>
                <li><a href="{{URL('/backend/news')}}"><img src="{{URL('/images/backend/menu/news.png')}}"/><p>News</p></a></li>
                <li><a href="{{URL('/backend/projects')}}"><img src="{{URL('/images/backend/menu/projects.png')}}"/><p>Projects</p></a></li>
                <li><a href="{{URL('/backend/downloads')}}"><img src="{{URL('/images/backend/menu/downloads.png')}}"/><p>Downloads</p></a></li>
                <li><a href="{{URL('/backend/media')}}"><img src="{{URL('/images/backend/menu/media.png')}}"/><p>Media</p></a></li>
                <li><a href="{{URL('/backend/slider')}}"><img style="transform:scaleY(-1);" src="{{URL('/images/backend/menu/media.png')}}"/><p>Slider</p></a></li>
                <li><a href="{{URL('/backend/partner')}}"><img src="{{URL('/images/backend/menu/partners.png')}}"/><p>Partner</p></a></li>
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
                <li><a href="{{URL::route('accountManagement', Auth::user()->username)}}">My Account</a></li>
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