<!DOCTYPE html>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="//unslider.com/unslider.min.js"></script>
        <script type="text/javascript" src="{{asset('/source/jquery.fancybox.pack.js')}}"></script>
        <title>Home - VertexDezign</title>
        <link rel="shortcut icon" href="{{{URL('/images/icon.png')}}}">
        <link href="{{ asset('/css/index.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/source/jquery.fancybox.css')}}" media="screen" />

    </head>
    <body>
        <nav>
            <div class="logo four">
                <a style="text-decoration: none;color:inherit;" href="{{{URL('/')}}}"><img src="{{URL('/images/logo.png')}}"/></a>
            </div>
            <div class="container">
                <div class="mobile-menu-toggler" onclick="$('.controllers.responsive-mobile').slideToggle();"></div>
                <div class="menu-holder">
                    <ul class="controllers">
                        @if (! \Auth::check())
                            <li><a href="{{{URL('/projects')}}}">Projects</a></li>
                            <li><a href="{{{URL('/downloads')}}}">Downloads</a></li>
                            <li><a href="{{{URL('/forum')}}}">Forum</a></li>
                        @else
                            <li><a href="{{{URL('/projects')}}}">Projects</a></li>
                            <li><a href="{{{URL('/downloads')}}}">Downloads</a></li>
                            <li><a href="{{{URL('/forum')}}}">Forum</a></li>
                            <li><a href="{{{URL('/backend')}}}">Dashboard</a></li>
                            <li><a href="{{{URL('/logout')}}}">Logout</a></li>
                        @endif
                    </ul>
                    <ul class="controllers responsive-mobile" style="display:none;">
                        @if (! \Auth::check())
                          <li><a href="{{{URL('/projects')}}}">Projects</a></li>
                          <li><a href="{{{URL('/downloads')}}}">Downloads</a></li>
                          <li><a href="{{{URL('/forum')}}}">Forum</a></li>
                        @else
                          <li><a href="{{{URL('/projects')}}}">Projects</a></li>
                          <li><a href="{{{URL('/downloads')}}}">Downloads</a></li>
                          <li><a href="{{{URL('/forum')}}}">Forum</a></li>
                          <li><a href="{{{URL('/backend')}}}">Dashboard</a></li>
                          <li><a href="{{{URL('/logout')}}}">Logout</a></li>
                        @endif
                    </ul>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
        </nav>
        @yield('content')
        <footer style="margin-top:100px;">
            <section class="top">
                <div class="container content">
                    <h3>VertexDezign</h3>
                </div>
            </section>
            <div class="container content">
                <div class="three">
                    <h3>Navigation</h3>
                    <ul class="controllers">
                        @if (! \Auth::check())
                            <li><a href="{{{URL('/projects')}}}">Projects</a></li>
                            <li><a href="{{{URL('/downloads')}}}">Downloads</a></li>
                            <li><a href="{{{URL('/forum')}}}">Forum</a></li>
                        @else
                            <li><a href="{{{URL('/projects')}}}">Projects</a></li>
                            <li><a href="{{{URL('/downloads')}}}">Downloads</a></li>
                            <li><a href="{{{URL('/forum')}}}">Forum</a></li>
                            <li><a href="{{{URL('/backend')}}}">Dashboard</a></li>
                        @endif
                    </ul>
                </div>
                <div class="three">
                    <h3>Backend</h3>
                    <ul class="controllers">
                    @if (! \Auth::check())
                        <li><a href="{{{URL('/login')}}}">Login</a></li>
                    @else
                        <li><a href="{{{URL('/logout')}}}">Logout</a></li>
                    @endif
                    </ul>
                </div>
                <div class="three" style="text-align:right;">
                    <h3>Follow us</h3>
                    <a href="https://www.facebook.com/pages/Vertexdezign/592374234121373"><img src="{{{URL('/images/layout/fb.png')}}}" style="float:right;margin-right:-10px;" /></a>
                    <div style="clear:Both;margin-bottom:25px;"></div>
                    <small>Copyright &copy; {{{date('Y')}}} VertexDezign</small>
                </div>
                <div style="clear:both;"></div>
            </div>
        </footer>
    </body>
</html>