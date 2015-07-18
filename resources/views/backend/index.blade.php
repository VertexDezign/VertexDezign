@extends('layout/backend')
@section('content')
    <div class="edit-header" style="background-color:#f1f4f9;padding:2px;border-bottom:1px solid #dee2e8;">
        <p>Backend / <span style="color:#0AA699;">Dashboard</span></p>
    </div>
    <div class="edit-header" style="background-color:#e9edf2;border-bottom:1px solid #dee2e8;">
        <div style="float:left;margin-left:25px;margin-top:15px;"><img src="{{URL('/images/backend/menu/black/dashboard.png')}}"></div><h1 style="float:left;margin-left:10px;">Dashboard</h1>
        <div style="clear:both;"></div>
    </div>
    <div class="pad" style="color:#515050">
        <div>
            <div class="three">
                <div style="border-bottom:2px solid #ccc;box-shadow:0 0 8px rgba(0, 0, 0, 0.1);background-color:#fff !important;padding:5px;margin-right:15px;height:150px;">
                    <div style="font-size:28px;padding:5px;">Latest todo's</div>
                    <div style="padding:5px;">Content</div>
                </div>
            </div>
            <div class="three">
                <div style="border-bottom:2px solid #ccc;box-shadow:0 0 8px rgba(0, 0, 0, 0.1);background-color:#fff !important;padding:5px;margin-right:15px;height:150px;">
                    <div style="font-size:28px;padding:5px;">Work in progress</div>
                    <div style="padding:5px;">Content</div>
                </div>
            </div>
            <div class="three">
                <div style="border-bottom:2px solid #ccc;box-shadow:0 0 8px rgba(0, 0, 0, 0.1);background-color:#fff !important;padding:5px;margin-right:15px;height:150px;">
                    <div style="font-size:28px;padding:5px;">Testing</div>
                    <div style="padding:5px;">Content</div>
                </div>
            </div>
        </div>
        <div style="clear:both;"></div>
        <div style="height:300px;background-color:#fff;margin-top:15px;"></div>
    </div>
@endsection