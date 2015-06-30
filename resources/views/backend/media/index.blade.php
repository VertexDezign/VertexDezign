@extends('layout/backend')
@section('content')
    <div class="edit-header" style="background-color: #f1f1f1;padding:2px;">
        <p>Backend / <span style="color:#0AA699;">Media</span></p>
    </div>
    <div class="edit-header">
        <div style="float:left;margin-left:25px;margin-top:15px;"><img src="{{URL('/images/backend/menu/projects.png')}}"></div><h1 style="float:left;margin-left:10px;">Media management</h1>
        <button onclick="window.location.href=''" class="btn blue" style="float:right;position:relative;margin-right:6px;margin-left:5px;margin-top:6px;" ><img src="{{URL('/images/backend/add.png')}}"></button> <!--TODO Add Media and Add Folder-->
        <button onclick="window.location.href=''" class="btn blue" style="float:right;position:relative;margin-top:6px;" ><img src="{{URL('/images/backend/refresh.png')}}"></button> <!--TODO-->
        <div style="clear:both;"></div>
        <hr/>
    </div>
    <div class="pad">
        @if (Session::has('error'))
            <p class="error">{{Session::get('error')}}</p>
        @elseif (Session::has('success'))
            <p class="success">{{Session::get('success')}}</p>
        @endif
        <!--TODO Add something like windows Editor for file view-->

    </div>
@endsection