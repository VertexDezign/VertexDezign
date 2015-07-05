@extends('layout/backend')
@section('content')
<style>
    .custom-menu {
        z-index:1000;
        position: absolute;
        background-color:#C0C0C0;
        border: 1px solid black;
        padding: 2px;
    }

</style>

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
                <button onclick="addFile()" class="btn blue small" style="float:right;position:relative;margin-left:0px;" ><img src="{{URL('/images/backend/add.png')}}"></button>
                <button onclick="addFolder()" class="btn blue small" style="float:right;position:relative;margin-left:0px;" ><img src="{{URL('/images/backend/addFolder.png')}}"></button>
                <button onclick="doRefresh()" class="btn blue small" style="float:right;position:relative;" ><img src="{{URL('/images/backend/refresh.png')}}"></button>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
            <input type="text" id="path" value="" readonly> <img alt="Directory Up" id="dirUp" onclick="goUp()" src="{{URL('/images/backend/arrowup.png')}}">
            <table>
                <thead>
                    <th>Name</th>
                    <th>Change Date</th>
                    <th>Size</th>
                    <th></th>
                </thead>
                <tbody id="tableBody">

                </tbody>
            </table>
            <!--TABLE-->
        </div>
    </div>
    <input type="file" multiple id="fileInput" style="display: none">
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
                    tr.css('user-select', 'none');
                    tr.css('cursor', 'pointer');
                    if (e[1]) {
                        tr.attr('name', e[0]);
                        tr.dblclick(function(e){
                            cutLastSlash();
                            path += '/' + $(this).attr('name');
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
                    tr.append();
                    tbody.append(tr);
                });
            }
        });

        if(path == "") {
            $('#dirUp').hide();
        } else {
            $('#dirUp').show();
        }
    }

    function addFolder() {
        var folderName = prompt("Please enter the Folder Name", "");
        if (folderName != "") {
            if (endsWith(path, '/')) {
                folderName = path_prefix + path + folderName;
            } else {
                folderName = path_prefix + path + '/' + folderName;
            }
            $.post('media/addfolder', {name: folderName}, function (data, textstatus, xhr) {
                if (textstatus == 'success') {
                    if (data) {
                        doRefresh();
                    } else {
                        alert("Something went wrong");
                    }
                }
            });
        }
    }

    function cutLastSlash() {
        if (endsWith(path, '/')) {
            path = path.substring(0, path.length);
        }
    }

    function goUp() {
        cutLastSlash();
        if (path.contains("/")) {
            path = path.substring(0, path.lastIndexOf("/"));
        } else {
            path = "";
        }
        $('#path').val(path);
        doRefresh();
    }

    function endsWith(str, suffix) {
        return str.indexOf(suffix, str.length - suffix.length) !== -1;
    }

    function addFile() {
        $('#fileInput').click().on('change', function(e) {
            var serverpath = path_prefix + path;

            var formData = new FormData();
            var xhr = new XMLHttpRequest();
            var token = $('#_token').val();
            var files = $("#fileInput")[0].files;

            formData.append('path', path_prefix + path);
            $.each(files, function(i, f) {
                formData.append('files[]', f);
            });

            xhr.upload.addEventListener("progress", function(e){
                var percent = (e.loaded / e.total)*100;
                //TODO add Progressbar
            }, false);

            xhr.open('POST', 'media/addfile', true);
            xhr.setRequestHeader("X-CSRF-Token", token);
            //xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {

                if (xhr.readyState==4){

                    var response = xhr.responseText;
                    try {
                        response = $.parseJSON(response);
                    } catch(e) {
                        response = false;
                    }
                    doRefresh();
                }
            };
            xhr.send(formData);

            resetFormElement($("#fileInput"));
        });

    }

    function resetFormElement(e) {
        e.wrap('<form>').closest('form').get(0).reset();
        e.unwrap();
    }

</script>
@endsection