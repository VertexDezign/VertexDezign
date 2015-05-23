<!DOCTYPE html>
<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <link href="{{ asset('/css/backend.css') }}" rel="stylesheet">
    <script>
        function openModal(id){
            $( "#" + id ).animate({bottom: '0'});
        }
        function closeModal(id){
            $( "#" + id ).animate({bottom: '-125px'});
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
            if(element.css('marginLeft')=='-250px'){
                element.animate({marginLeft: '0'});
                container.animate({'left': '250px'});
            }else{
                element.animate({marginLeft: '-250px'});
                container.animate({'left': '0'});
            }
            console.log('finished');
        }
    </script>
</head>
<body>
<nav>
    <h1><span>Vertex</span>backend</h1>
    <button onclick="window.location.href='{{URL('/')}}'"><img src="{{URL('/images/backend/home.png')}}" /></button>
    <div style="clear:both;"></div>
    <ul style="list-style:none;padding:1px;margin:0;height:250px;">
        <li><a class="green" href="{{URL('/backend/news')}}" onclick="scroll('#');"><button><img src="{{URL('/images/backend/news.png')}}"/>Manage news</button></a></li>
        <li><a class="green" href="{{URL('/backend/projects')}}" onclick="scroll('#');"><button><img src="{{URL('/images/backend/news.png')}}"/>Manage projects</button></a></li>
        <li><a class="green" href="{{URL('/backend/downloads')}}" onclick="scroll('#');"><button><img src="{{URL('/images/backend/news.png')}}"/>Manage dowloads</button></a></li>
        <li><a class="green" href="{{URL('/backend/media')}}" onclick="scroll('#');"><button><img src="{{URL('/images/backend/news.png')}}"/>Manage media</button></a></li>
        <li><a class="green" href="{{URL('/backend/wip')}}" onclick="scroll('#');"><button><img src="{{URL('/images/backend/news.png')}}"/>WIP mangement</button></a></li>
    </ul>
</nav>
<div class="container">
    <header>
        <button onclick="toggleSideMenu()"><img src="{{URL('/images/backend/menu-alt.png')}}" /></button>
        <img src="{{URL('/images/backend/search.png')}}" class="search-icon"/>
        <input type="search" placeholder="Search in admin panel" />
        <button style="float:right;margin-right:5px;" class="rotate" onclick="toggleMenu('settings-menu');"><img src="{{URL('/images/backend/settings.png')}}" /></button>
        <ul class="dropdown" id="settings-menu">
            <li><a>My Account</a></li>
            <li><a>Settings</a></li>
            <li style="border-top:1px solid #e4e4e4;"><a href="{{URL('/logout')}}">Logout</a></li>
        </ul>

        <?php
        echo '<a style="float:right;margin-top:20px;margin-right:5px;">'.Auth::user()->firstname . ' <strong>' . Auth::user()->lastname.'</strong></a>';
        ?>

    </header>
    @yield('content')
</div>
</body>
</html>