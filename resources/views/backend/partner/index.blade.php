@extends('layout/backend')
@section('content')
    <div class="edit-header" style="background-color:#f1f4f9;padding:2px;border-bottom:1px solid #dee2e8;">
        <p>Backend / <span style="color:#0AA699;">Partner</span></p>
    </div>
    <div class="edit-header" style="background-color:#e9edf2;border-bottom:1px solid #dee2e8;">
        <div style="float:left;margin-left:25px;margin-top:15px;"><img src="{{URL('/images/backend/menu/black/media.png')}}"></div><h1 style="float:left;margin-left:10px;">Partner management</h1>
        <div style="clear:both;"></div>
    </div>
    <div class="pad">
        @if (Session::has('error'))
            <div class="modal red" id="message">
                <input name="file" value="" style="display:none;" />
                <div class="left">
                    <p>{{Session::get('error')}}</p>
                    <span></span>
                </div>
            </div>
        @elseif (Session::has('success'))
            <div class="modal blue" id="message">
                <input name="file" value="" style="display:none;" />
                <div class="left">
                    <p>{{Session::get('success')}}</p>
                    <span></span>
                </div>
            </div>
        @endif
        <div style="padding:10px;background-color:#fff;">
            <div style="width:50%;float:left;">
                <h4 style="font-size:14px;float:left;margin:0;padding:20px;font-weight:600;color:#515050;">Manage rows</h4>
            </div>
            <div style="width:50%;float:right;">
                <button onclick="window.location.href='{{ route('add_partner') }}'" class="btn blue small" style="float:right;position:relative;margin-left:0px;" ><img src="{{URL('/images/backend/add.png')}}"></button>
                <button onclick="window.location.href='{{ route('partner') }}'" class="btn blue small" style="float:right;position:relative;" ><img src="{{URL('/images/backend/refresh.png')}}"></button>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>

            <table class="tbl">
                <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" /></th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Link</th>
                    <th>Last updated at</th>
                    <th>Posted on</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($entry as $partner)
                    <tr>
                        <td style="text-align:center;"><input type="checkbox" /></td>
                        <td>{{$partner->title}}</td>
                        <td><img style="height:100px;" src="{{URL('/media', $partner->image)}}"/></td>
                        <td>{{$partner->link}}</td>
                        <td>{{$partner->updated_at}}</td>
                        <td>{{$partner->created_at}}</td>
                        <td>
                            <a href="{{ URL::route('edit_partner', $partner->id) }}"><button class="btn blue"><img src="{{URL('/images/backend/edit.png')}}" class="edit-icon"/></button></a>
                            <button class="btn red" style="font-weight:bold;" onclick="openModal('delete{{$partner->id}}')">X</button>
                        </td>
                    </tr>

                    <div class="modal red" id="delete{{$partner->id}}">
                        <form action="{!! URL::route('delete_partner', $partner->id) !!}" method="post">
                            <input name="file" value="{{$partner->title}}" style="display:none;" />
                            <div class="left">
                                <p>Are you sure to delete this item?</p>
                                <span>{{$partner->title}}</span>
                            </div>
                            <div class="right" style="padding-top:30px;">
                                <button>Delete</button>
                                <button onclick="closeModal('delete{{$partner->id}}');return false;">Cancel</button>
                            </div>
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        </form>
                    </div>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection