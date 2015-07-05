@extends('layout/backend')
@section('content')
    <div class="edit-header" style="background-color:#f1f4f9;padding:2px;border-bottom:1px solid #dee2e8;">
        <p>Backend / <span style="color:#0AA699;">Projects</span></p>
    </div>
    <div class="edit-header" style="background-color:#e9edf2;border-bottom:1px solid #dee2e8;">
        <div style="float:left;margin-left:25px;margin-top:15px;"><img src="{{URL('/images/backend/menu/black/projects.png')}}"></div><h1 style="float:left;margin-left:10px;">Projects management</h1>
        <div style="clear:both;"></div>
    </div>
    <div class="pad">
        @if (Session::has('error'))
            <p class="error">{{Session::get('error')}}</p>
        @elseif (Session::has('success'))
            <p class="success">{{Session::get('success')}}</p>
        @endif

        <div style="padding:10px;background-color:#fff;">
            <div style="width:50%;float:left;">
                <h4 style="font-size:14px;float:left;margin:0;padding:20px;font-weight:600;color:#515050;">Manage rows</h4>
            </div>
            <div style="width:50%;float:right;">
                <button onclick="window.location.href='{{ route('add_project') }}'" class="btn blue small" style="float:right;position:relative;margin-left:0px;" ><img src="{{URL('/images/backend/add.png')}}"></button>
                <button onclick="window.location.href='{{ route('add_project') }}'" class="btn blue small" style="float:right;position:relative;" ><img src="{{URL('/images/backend/refresh.png')}}"></button>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>

            <table class="tbl">
                <thead>
                <tr>
                    <th style="text-align:center;"><input type="checkbox" /></th>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Last updated at</th>
                    <th>Posted on</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($entry as $project)
                    <tr>
                        <td style="text-align:center;"><input type="checkbox" /></td>
                        <td>{{$project->name}}</td>
                        <td>{{$project->title}}</td>
                        <?php echo '<td>' . Auth::user()->find($project->user_id)->username . '</td>' ?>
                        <td>{{$project->updated_at}}</td>
                        <td>{{$project->created_at}}</td>
                        <td>
                            <a href="{{ URL::route('edit_project', $project->id) }}"><button class="btn blue"><img src="{{URL('/images/backend/edit.png')}}" class="edit-icon"/></button></a>
                            <button class="btn red" style="font-weight:bold;" onclick="openModal('delete{{$project->id}}')">X</button>
                        </td>
                    </tr>

                    <div class="modal red" id="delete{{$project->id}}">
                        <form action="{!! URL::route('delete_project', $project->id) !!}" method="post">
                            <input name="file" value="{{$project->title}}" style="display:none;" />
                            <div class="left">
                                <p>Weet u zeker dat u dit bestand wilt verwijderen?</p>
                                <span>{{$project->title}}</span>
                            </div>
                            <div class="right" style="padding-top:30px;">
                                <button>Delete</button>
                                <button onclick="closeModal('delete{{$project->id}}');return false;">Cancel</button>
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