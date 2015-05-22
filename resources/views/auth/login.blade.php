@extends('layout/master')

@section('content')
    <header style="height:calc(100% - 75px)">
        <div class="container content">
            <section class="loginform" style="margin-bottom:10%;">
                <form method="post">
                    <div class="content" style="padding-top:30%;text-align:left;">
                        <h2>Inloggen</h2>
                        @if (Session::has('error'))
                            <p class="error">{{Session::get('error')}}</p>
                        @endif
                        <span class="form-sign"><img src="{{ url('/images/user.png') }}" style="position:Relative;top:12px;" /></span>
                        <input name="username" type="text" placeholder="username" style="padding-left:60px;" REQUIRED style="margin-top:10px;" />


                        <span class="form-sign"><img src="{{ url('/images/key.png') }}" style="position:Relative;top:12px;" /></span>
                        <input name="password" type="password" placeholder="password" style="padding-left:60px;" REQUIRED />
                        <div class="pass-icon"></div>
                        <button style="width:100%;background:#3FCC3F;border:0;margin-top:2px;border-radius:0;height:40px;line-height:10px;">Inloggen</button>
                    </div>
                    <div class="two" style="text-align: left;">
                        <p style="text-align:left;">Nog geen account?</p>
                    </div>
                    <div class="two" style="text-align: right;">
                        <a href="{{URL('/aanmelden')}}" class="white">Aanmelden</a>
                    </div>
                    <div style="clear: both">

                    </div>
                </form>
            </section>
        </div>
    </header>
@endsection