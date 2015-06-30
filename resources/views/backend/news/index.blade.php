@extends('layout/backend')
@section('content')
    <div class="edit-header" style="background-color: #f1f1f1;padding:2px;">
        <p>Backend / <span style="color:#0AA699;">News</span></p>
    </div>
    <div class="edit-header">
        <div style="float:left;margin-left:25px;margin-top:15px;"><img src="{{URL('/images/backend/menu/projects.png')}}"></div><h1 style="float:left;margin-left:10px;">News management</h1>
        <button onclick="window.location.href='{{ route('add_news') }}'" class="btn blue" style="float:right;position:relative;margin-right:6px;margin-left:5px;margin-top:6px;" ><img src="{{URL('/images/backend/add.png')}}"></button>
        <button onclick="window.location.href='{{ route('add_news') }}'" class="btn blue" style="float:right;position:relative;margin-top:6px;" ><img src="{{URL('/images/backend/refresh.png')}}"></button>
        <div style="clear:both;"></div>
        <hr/>
    </div>
    <div class="pad">
        @if (Session::has('error'))
            <p class="error">{{Session::get('error')}}</p>
        @elseif (Session::has('success'))
            <p class="success">{{Session::get('success')}}</p>
        @endif
        <table class="tbl">
            <thead>
            <tr>
                <th style="text-align:center;"><input type="checkbox" /></th>
                <th>Title</th>
                <th>Author</th>
                <th>Last updated at</th>
                <th>Posted on</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($entry as $news)
                <tr>
                    <td style="text-align:center;"><input type="checkbox" /></td>
                    <td>{{$news->title}}</td>
                    <?php echo '<td>' . Auth::user()->find($news->author_id)->username . '</td>' ?>
                    <td>{{$news->updated_at}}</td>
                    <td>{{$news->created_at}}</td>
                    <td>
                        <a href="{{ URL::route('edit_news', $news->id) }}"><button class="btn blue"><img src="{{URL('/images/backend/edit.png')}}" class="edit-icon"/></button></a>
                        <button class="btn red" style="font-weight:bold;" onclick="openModal('delete{{$news->id}}')">X</button>
                    </td>
                </tr>

                <div class="modal red" id="delete{{$news->id}}">
                    <form action="{!! URL::route('delete_news', $news->id) !!}" method="post">
                        <input name="file" value="{{$news->title}}" style="display:none;" />
                        <div class="left">
                            <p>Weet u zeker dat u dit bestand wilt verwijderen?</p>
                            <span>{{$news->title}}</span>
                        </div>
                        <div class="right" style="padding-top:30px;">
                            <button>Delete</button>
                            <button onclick="closeModal('delete{{$news->id}}');return false;">Cancel</button>
                        </div>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    </form>
                </div>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection