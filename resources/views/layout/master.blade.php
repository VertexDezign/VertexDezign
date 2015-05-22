<!DOCTYPE html>
<html>
    <head>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>     
        <link href="{{ asset('/css/index.css') }}" rel="stylesheet">        
    </head>
    <body>
        <nav>
          <div class="container">
              <a href="{{{URL('/')}}}" class="title"><img src="{{URL('/images/vertexDezign_logo.png')}}"/></a>
              <div class="menu-holder">
            <ul class="controllers">
              @if (! \Auth::check())
                    <li><a href="{{{URL('/news')}}}">News</a></li>
                    <li><a href="{{{URL('/projects')}}}">Projects</a></li>
                    <li><a href="{{{URL('/downloads')}}}">Downloads</a></li>
                    <li><a href="{{{URL('/login')}}}">Login</a></li>
              @else
                    <li><a href="{{{URL('/news')}}}">News</a></li>
                    <li><a href="{{{URL('/projects')}}}">Projects</a></li>
                    <li><a href="{{{URL('/downloads')}}}">Downloads</a></li>
                    <li><a href="{{{URL('/backend')}}}">Dashboard</a></li>
                    <li><a href="{{{URL('/logout')}}}">Logout</a></li>
              @endif
                  </ul>
                  <div style="clear:both;"></div>
              </div>
              <div class="mobile-menu-toggler"></div>
          </div>
        </nav>
        <div style="height:15px;background:#2E3539;"></div>
          @yield('content')
        <footer>          
        </footer>
    </body>
</html>