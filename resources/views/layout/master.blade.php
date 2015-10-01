<!DOCTYPE html>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script src="//unslider.com/unslider.min.js"></script>
        <script type="text/javascript" src="{{asset('/source/jquery.fancybox.pack.js')}}"></script>

        <link rel="shortcut icon" href="{{{URL('/favicon.ico')}}}">
        <link href="{{ asset('/css/index.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('/source/jquery.fancybox.css')}}" media="screen" />
        <!-- Title Meta -->
        <title>@yield('title') - VertexDezign</title>
        <meta name="description" content="@yield('description')">

        <!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
        <script type="text/javascript">
            window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience on our website","dismiss":"Got it!","learnMore":"More info","link":"http://vertexdezign.net/forum/index.php/CookiePolicy/","domain":"vertexdezign.net","theme":"light-bottom"};
        </script>

        <script type="text/javascript" src="//s3.amazonaws.com/cc.silktide.com/cookieconsent.latest.min.js"></script>
        <!-- End Cookie Consent plugin -->

    </head>
    <body>
            <nav>
                <div class="logo">
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
            <div class="container">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- VertexDezign FP -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-8639304076819326"
                     data-ad-slot="1710578290"
                     data-ad-format="auto"></ins>
                <script>
                    $(document).ready(function() {
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    });
                </script>
            </div>
            @yield('content')
            <div class="container">
                <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                <!-- VertexDezign FP -->
                <ins class="adsbygoogle"
                     style="display:block"
                     data-ad-client="ca-pub-8639304076819326"
                     data-ad-slot="1710578290"
                     data-ad-format="auto"></ins>
                <script>
                    $(document).ready(function() {
                        (adsbygoogle = window.adsbygoogle || []).push({});
                    });
                </script>
            </div>
            <footer>
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
                        <div style="clear:Both;"></div>
                        <small><a style="color: #777; text-decoration: none;" href="{{URL("/forum/index.php/LegalNotice/")}}">Impressum</a></small>
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </footer>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-64802618-1', 'auto');
            ga('send', 'pageview');

        </script>
    </body>
</html>