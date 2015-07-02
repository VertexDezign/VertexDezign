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
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
        <!--TODO Add something like windows Editor for file view-->
        <div style="padding:10px;background-color:#fff;">
            <div style="width:50%;float:left;">
                <h4 style="font-size:14px;float:left;margin:0;padding:20px;font-weight:600;color:#515050;">Manage rows</h4>
            </div>
            <div style="width:50%;float:right;">
                <button onclick="addFolder()" class="btn blue small" style="float:right;position:relative;margin-left:0px;" ><img src="{{URL('/images/backend/add.png')}}"></button>
                <button onclick="doRefresh()" class="btn blue small" style="float:right;position:relative;" ><img src="{{URL('/images/backend/refresh.png')}}"></button>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
            <input type="text" id="path" value="">
            <table>
                <thead>
                    <th>Name</th>
                    <th>Change Date</th>
                    <th>Size</th>
                </thead>
                <tbody id="tableBody">

                </tbody>
            </table>
            <!--TABLE-->
        </div>
    </div>

<script type="text/javascript">
    var tbody = $('#tableBody');
    var path_prefix = 'media/';
    var path = '';

    $(document).ready(function() {
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('#_token').val()
                }
            });
        });

        doRefresh();
    });

    function doRefresh() {
        var pathInput = $('#path');
        path = pathInput.val();
        $.get('media/getfolder', {folder: path_prefix + path} ,function(data, textstatus, xhr) {
            if (textstatus == 'success') {
                tbody.empty();
                $.each(data, function(i, e) {
                    var tr = $('<tr>');
                    var text;
                    if (e[1]) {
                        tr.attr('name', e[0]);
                        tr.dblclick(function(e){
                            path += $(this).attr('name');
                            $('#path').val(path);
                            doRefresh();
                        });
                        text = '<img src="../images/backend/folder.png">' + e[0];
                    } else {
                        text = '<img src="../images/backend/file.png">' + e[0];
                    }
                    tr.append($('<td>' + text + '</td>'));
                    tr.append($('<td>' + e[2] + '</td>'));
                    tr.append($('<td>' + e[3] + '</td>'));
                    tbody.append(tr);
                });
            }
        });
    }

    function addFolder() {
        var folderName = prompt("Please enter the Folder Name", "");
        if (endsWith(path, '/')) {
            folderName = path + folderName;
        } else {
            folderName = path + '/' + folderName;
        }
        $.post('media/addfolder', { name: folderName} ,function(data, textstatus, xhr) {
            if (textstatus == 'success') {
                if (data) {
                    doRefresh();
                } else {
                    alert("Something went wrong");
                }
            }
        });
    }

    function endsWith(str, suffix) {
        return str.indexOf(suffix, str.length - suffix.length) !== -1;
    }
</script>
@endsection