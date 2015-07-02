@extends('layout/backend')
@section('content')
    <div class="edit-header" style="background-color:#f1f4f9;padding:2px;border-bottom:1px solid #dee2e8;">
        <p>Backend / <span style="color:#0AA699;">Media</span></p>
    </div>
    <div class="edit-header" style="background-color:#e9edf2;border-bottom:1px solid #dee2e8;">
        <div style="float:left;margin-left:25px;margin-top:15px;"><img src="{{URL('/images/backend/menu/black/media.png')}}"></div><h1 style="float:left;margin-left:10px;">Media management</h1>
        <div style="clear:both;"></div>
    </div>
    <div class="pad">
        @if (Session::has('error'))
            <p class="error">{{Session::get('error')}}</p>
        @elseif (Session::has('success'))
            <p class="success">{{Session::get('success')}}</p>
        @endif
        <!--TODO Add something like windows Editor for file view-->
        <div style="padding:10px;background-color:#fff;">
            <div style="width:50%;float:left;">
                <h4 style="font-size:14px;float:left;margin:0;padding:20px;font-weight:600;color:#515050;">Manage rows</h4>
            </div>
            <div style="width:50%;float:right;">
                <button onclick="window.location.href=''" class="btn blue small" style="float:right;position:relative;margin-left:0px;" ><img src="{{URL('/images/backend/add.png')}}"></button>
                <button onclick="window.location.href=''" class="btn blue small" style="float:right;position:relative;" ><img src="{{URL('/images/backend/refresh.png')}}"></button>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>

            <!--TABLE-->
        </div>
    </div>
@endsection