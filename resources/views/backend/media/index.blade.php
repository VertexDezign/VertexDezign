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
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
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
                <input type="text" id="path" value="" readonly style="width: 80%; color: #0AA699;box-sizing: border-box;height: 40px;margin-bottom: 8.5px;padding-left: 15px;border: 1px solid #CCC;"> <img style="margin:-2.5px -25px;" alt="Directory Up" id="dirUp" onclick="goUp()" src="{{URL('/images/backend/arrowup.png')}}">
                <table class="tbl">
                    <thead>
                        <th style="width: 20px;"></th>
                        <th>Name</th>
                        <th style="text-align: center;">Change Date</th>
                        <th style="text-align: right;">Size</th>
                        <th></th>
                    </thead>
                    <tbody id="tableBody">

                    </tbody>
                </table>
        </div>
        <div class="modal red" id="delete">
            <form id="deleteForm">
                <input name="file" id="deleteTitle" value="" style="display:none;" />
                <div class="left">
                    <p>Are you sure to delete this item?</p>
                    <span id="deleteSpan"></span>
                </div>
                <div class="right" style="padding-top:30px;">
                    <button type="button" onclick="deleteMedia()">Delete</button>
                    <button type="button" onclick="closeModal('delete');return false;">Cancel</button>
                </div>
            </form>
        </div>
        <div class="modal blue" id="info">
            <input name="file" value="" style="display:none;" />
            <div class="left">
                <p id="infoModalTitle"></p>
                <span id="infoModalText"></span>
            </div>
        </div>
        <div class="modal blue" id="progress">
            <div class="">
                <progress value="0" max="100" id="progressbar" style="width: 100%; height: 30px;"></progress>
            </div>
        </div>
    </div>
    <input type="file" multiple id="fileInput" style="display: none">
<script type="text/javascript">
    var tbody = $('#tableBody');
    var path_prefix = 'media/';
    var path = '';
    var infoModal = $( "#info" );
    var xhr = new XMLHttpRequest();

    var progressbar = $('#progressbar');
    xhr.upload.addEventListener("progress", function(e){
        var percent = (e.loaded / e.total)*100;
        progressbar.val(percent);
    }, false);

    $(document).ready(function() {
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('#_token').val()
                }
            });
        });



        $(document).keydown(function(e){
            var row = tbody.find('tr:hover');
            if (e.which == 113 && row.html()) {
                editName(tbody.find('tr:hover').find('td:last').find('div').find('button:first'));
            }
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
                    tr.addClass('highlight');
                    tr.attr('name', e[0]);
                    //tr.attr('draggable', true);
                    if (e[1]) {
                        tr.dblclick(function(e){
                            cutLastSlash(path);
                            path += '/' + $(this).attr('name');
                            $('#path').val(path);
                            doRefresh();
                        });
                    }
                    text = '<img src="' + e[4] + '">';
                    tr.append($('<td style="width: 20px;">' + text + '</td>'));
                    tr.append($('<td>' + e[0] + '</td>'));
                    tr.append($('<td style="text-align: center">' + e[2] + '</td>'));
                    if (e[3] > Math.pow(10, 6)) {
                        tr.append($('<td style="text-align: right;">' + MRound(e[3] / Math.pow(10, 6), 2) + ' Mb' + '</td>'));
                    } else {
                        tr.append($('<td style="text-align: right;">' + MRound(e[3] / 1000, 2) + ' kb' + '</td>'));
                    }
                    tr.append($('<td><div style="float: right"><button class="btn blue small" onclick="editName(this)"><img src="../images/backend/edit.png" width="19"></button><button onclick="confirmDelete(this)" class="btn blue small"><img src="../images/backend/delete.png" width="19"></button></div></td>'));
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

    function goUp() {
        cutLastSlash(path);
        var includesSlash = false;
        if (typeof(path.includes) == "function") {
            includesSlash = path.includes('/'); //Chrome
        } else {
            includesSlash = path.contains('/'); //Firefox
        }

        if (includesSlash) {
            path = path.substring(0, path.lastIndexOf("/"));
        } else {
            path = "";
        }
        $('#path').val(path);
        doRefresh();
    }

    function addFolder() {
        var folderName = prompt("Please enter the Folder Name", "");
        if (folderName != "" && folderName != null && folderName != undefined) {
            $.post('media/addfolder', {path: path_prefix + path, name: folderName}, function (data, textstatus, xhr) {
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

    function confirmDelete(o) {
        var media = $(o).parent().parent().parent().attr('name');

        $('#deleteTitle').val(media);
        $('#deleteSpan').text(media);
        openModal('delete');
    }

    function deleteMedia() {
        var media = $('#deleteTitle').val();
        $.post('media/delete', {file: path_prefix + path + '/' + media}, function(data, textstatus, xhr) {
            if (textstatus == 'success') {
                closeModal('delete');
                if (data.type == 'file') {
                    if (data.done) {
                        doRefresh();
                        $('#infoModalTitle').text(media + ' deleted succesfully!');
                        infoModal.addClass('blue').removeClass('red');
                    } else {
                        infoModal.addClass('red').removeClass('blue');
                        $('#infoModalTitle').text('Something went wrong!');
                    }

                } else if (data.type == 'dir' ) {
                    if (data.done) {
                        doRefresh();
                        infoModal.addClass('blue').removeClass('red');
                        $('#infoModalTitle').text(media + ' deleted succesfully!');

                    } else {
                        infoModal.addClass('red').removeClass('blue');
                        $('#infoModalTitle').text(data.msg);
                    }
                } else {
                    infoModal.addClass('red').removeClass('blue');
                    $('#infoModalTitle').text('Something went wrong!');
                }
                openModal('info');
                infoModal.delay(2000).animate({bottom: '-125px'},{duration:1000});
            }
        });
    }

    function editName(o) {
        var tr = $(o).parent().parent().parent();
        var media = tr.attr('name');
        var td = tr.find('td:eq(1)');

        td.empty();
        td.append($('<input type="text" onkeyup="saveEdit(this, event)" style="width: 98%">').val(media).attr('previousName', media));
    }

    function saveEdit(o, event) {

        var holder = event.which;

        if (holder == 13) { //Enter
            var oldName = $(o).attr('previousName');
            var newName = $(o).val();

            $.post('media/edit', {oldName: path_prefix + path + '/' + oldName, newName: path_prefix + path + '/' + newName}, function(data, textstatus, xhr) {
                if (textstatus == 'success') {
                    if (data) {
                        doRefresh();
                    }
                }
            });
        } else if(holder == 27) { //ESC
            var tr = $(o).parent().parent();
            var media = tr.attr('name');
            var td = tr.find('td:eq(1)');

            td.empty();
            td.append(media);
        }
    }



    function addFile() {

        $('#fileInput').click().on('change', function(e) {
            var serverpath = path_prefix + path;

            var formData = new FormData();
            var token = $('#_token').val();
            var files = $("#fileInput")[0].files;


            formData.append('path', path_prefix + path);
            $.each(files, function(i, f) {
                formData.append('files[]', f);
            });

            xhr.open('POST', 'media/addfile', true);
            xhr.setRequestHeader("X-CSRF-Token", token);
            //xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {

                if (xhr.readyState==4){
                    if (xhr.status==200) {
                        var response = xhr.responseText;
                        try {
                            response = $.parseJSON(response);
                        } catch (e) {
                            response = false;
                        }
                        doRefresh();
                    }
                    closeModal('progress');
                }
            };
            openModal('progress');
            xhr.send(formData);
            resetFormElement($("#fileInput"));

        });

    }

    function resetFormElement(e) {
        e.wrap('<form>').closest('form').get(0).reset();
        e.unwrap();
    }

    function MRound(num, places){
        return +(Math.round(num + "e+" + places)  + "e-" + places);
    }

</script>
@endsection