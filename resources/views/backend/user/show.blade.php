@extends('layout/backend')
@section('content')
    <div class="edit-header" style="background-color:#f1f4f9;padding:2px;border-bottom:1px solid #dee2e8;">
        <p>Backend / <span style="color:#0AA699;">{{$entry->username}}</span> / @if(isset($entry)) Edit @else Add @endif</p>
    </div>
    <div class="edit-header" style="background-color:#e9edf2;border-bottom:1px solid #dee2e8;">
        <div style="float:left;margin-left:25px;margin-top:15px;"><img src="{{URL('/images/backend/addContent.png')}}"></div><h1 style="float:left;margin-left:10px;">Account management</h1>
        <div style="clear:both;"></div>
    </div>
    <div class="pad">
        <h1>Hello {{$entry->username}}</h1>

            <form method="post" role="post" action="@if(isset($entry)){{route('update_download')}}@else{{route('insert_download')}}@endif">
                <div class="two" style="padding-right:5px;">
                    <!-- Firstname -->
                    <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">Firstname</label></div>
                    <div class="three-two">
                        <input name="name" placeholder="Name" type="text" value="@if(isset($entry)){{$entry['firstname']}}@endif" REQUIRED />
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="two" style="padding-right:5px;">
                    <!-- Surname -->
                    <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">Surname</label></div>
                    <div class="three-two">
                        <input name="name" placeholder="Name" type="text" value="@if(isset($entry)){{$entry['surname']}}@endif" REQUIRED />
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="two" style="padding-right:5px;">
                    <!-- New email address -->
                    <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">New email address</label></div>
                    <div class="three-two">
                        <input name="name" placeholder="Name" type="text" value="@if(isset($entry)){{$entry['email']}}@endif" REQUIRED />
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="two" style="padding-right:5px;">
                    <!-- New email address -->
                    <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">New email address</label></div>
                    <div class="three-two">
                        <input name="name" placeholder="Name" type="text" value="@if(isset($entry)){{$entry['email']}}@endif" REQUIRED />
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="two" style="padding-right:5px;">
                    <!-- New password -->
                    <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">New password</label></div>
                    <div class="three-two">
                        <input name="name" placeholder="Name" type="password" value="@if(isset($entry)){{$entry['password']}}@endif" REQUIRED />
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="two" style="padding-right:5px;">
                    <!-- New password -->
                    <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">New password</label></div>
                    <div class="three-two">
                        <input name="name" placeholder="Name" type="password" value="@if(isset($entry)){{$entry['password']}}@endif" REQUIRED />
                    </div>
                    <div style="clear:both;"></div>
                </div>
            </form>
    </div>
@endsection