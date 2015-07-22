@extends('layout/master')
@section('title', 'Login')
@section('description', 'This is the login page of VertexDezign')
@section('content')
    <header style="height:calc(100% - 75px)">
        <div class="container content">
            <section class="loginform" style="margin-bottom:10%;">
                <form method="post">
                    <div class="login" style="padding-top:30%;text-align:left;">
                        <h2>Inloggen</h2>
                        @if (Session::has('error'))
                            <p class="error">{{Session::get('error')}}</p>
                        @endif
                        <span class="form-sign"><img src="{{ url('/images/layout/login/user.png') }}" style="position:Relative;top:12px;" /></span>
                        <input name="username" type="text" placeholder="username" style="padding-left:60px;" REQUIRED style="margin-top:10px;" />


                        <span class="form-sign"><img src="{{ url('/images/layout/login/key.png') }}" style="position:Relative;top:12px;" /></span>
                        <input name="password" type="password" placeholder="password" style="padding-left:60px;" REQUIRED />
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <div class="pass-icon"></div>
                        <button style="width:100%;border:0;margin-top:2px;border-radius:0;height:40px;line-height:10px;">Log in</button>
                    </div>
                </form>
            </section>
        </div>
    </header>
@endsection