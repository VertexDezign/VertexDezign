<script type="text/javascript">
    function folderUp() {
        var path = mediaSelector.path;
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
            path = mediaSelector.defaultpath;
        }
        mediaSelector.path = path;
        refreshMediaSelector();
    }

    var mediaSelector = {
        div : null,
        input : null,
        loc : null,
        arrowUp : null,
        table : null,
        tbody: null,

        closeCallback : function() {},

        path : "media",
        defaultpath : "media",
        basepath : '{{URL("/")}}' + '/',
        selectedMedia : ""
    };

    function refreshMediaSelector() {
        mediaSelector.loc.val(mediaSelector.path);
        $.get('{{URL("backend/media/getfolder")}}', {folder: mediaSelector.path} ,function(data, textstatus, xhr) {
            if (textstatus == 'success') {
                mediaSelector.tbody.empty();
                $.each(data, function(i, e) {
                    var tr = $('<tr>');
                    var text;
                    tr.css('user-select', 'none');
                    tr.css('cursor', 'pointer');
                    tr.addClass('highlight');
                    tr.attr('name', e[0]);
                    if (e[1]) {
                        tr.dblclick(function(e){
                            cutLastSlash(mediaSelector.path);
                            mediaSelector.path += '/' + $(this).attr('name');
                            mediaSelector.loc.val(mediaSelector.path);
                            refreshMediaSelector();
                        });
                    } else {
                        tr.dblclick(function(e){
                            addMedia();
                            mediaSelector.closeCallback();
                        });
                        tr.click(function(e){
                            mediaSelector.selectedMedia = $(this).attr('name');
                            $('.imageview').attr('src', mediaSelector.basepath + mediaSelector.path + '/' + $(this).attr('name'));
                        });
                    }
                    text = '<img src="' + e[4] + '">';
                    tr.append($('<td style="width: 20px;">' + text + '</td>'));
                    tr.append($('<td>' + e[0] + '</td>'));
                    mediaSelector.tbody.append(tr);
                });
                calcTable();
            }
        });

        if(mediaSelector.path == mediaSelector.defaultpath) {
            $('#dirUp').hide();
        } else {
            $('#dirUp').show();
        }
    }

    function createMediaSelector(divId, inputId, closeCallback) {
        mediaSelector.closeCallback = closeCallback;
        mediaSelector.div = $('#' + divId);
        mediaSelector.input = $('#' + inputId);
        var arrowUp = '{{URL("/images/backend/arrowup.png")}}';
        mediaSelector.loc = $('<input type="text" id="path" value="" readonly style="width: 80%">');
        mediaSelector.arrowUp = $('<img style="margin:-2.5px -25px;" alt="Directory Up" id="dirUp" onclick="folderUp()" src="' + arrowUp + '">');
        mediaSelector.table = $('<table class="tbl" style="width:80%;color: black;"><thead style="display: block;"><th style="width: 20px;"></th><th>Name</th></thead></table>');
        mediaSelector.tbody = $('<tbody style="display: block; height: 200px; overflow: auto;"></tbody>');
        mediaSelector.table.append(mediaSelector.tbody);
        refreshMediaSelector();
        mediaSelector.div.empty().append(mediaSelector.loc).append(mediaSelector.arrowUp).append(mediaSelector.table);
    }

    function addMedia() {
        var path = mediaSelector.path.substr(6);
        mediaSelector.input.val(path + '/' +  mediaSelector.selectedMedia);
        $('#imageview').attr('src', mediaSelector.basepath + mediaSelector.path + '/' + mediaSelector.selectedMedia);
    }

    function calcTable() {
        // Change the selector if needed
        var $table = mediaSelector.table,
            $bodyCells = $table.find('tbody tr:first').children(),
            colWidth;

        // Get the tbody columns width array
        colWidth = $bodyCells.map(function() {
            return $(this).width();
        }).get();

        // Set the width of thead columns
        $table.find('thead tr').children().each(function(i, v) {
            $(v).width(colWidth[i]);
        });
    }

    $(document).ready(function(){
        $('#dirUp').hide();
    });
</script>
<div class="three" style="width:85%;"><label class="basic-label" style="margin-bottom:8.5px;">Image preview</label></div>
<input type="button" name="Add" value="Set image" class="btn red" style="float:right;width:15%;margin:0px;padding:12.5px;" onclick="openModal('imageModal')">
<input type="hidden" id="image" name="{{ $fileInputName }}" value="@if(isset($entry) && isset($entry['image'])){{$entry['image']}}@endif">
<div class="three" style="width:100%;">
    <div class="modal blue" id="imageModal" style="height: 350px;bottom:-350px;">
        <div class="two">
            <div id="imageSelector"></div>
            <script type="text/javascript">createMediaSelector('imageSelector', 'image', function() {
                    closeModal('imageModal') ;
                });
            </script>
        </div>
        <div class="two">
            <img class="imageview" style="max-width: 60%;max-height: 250px;padding-left:0%;" src="@if(isset($entry)){{URL('/media/' . $entry['image'])}}@else {{URL('images/empty.png')}}@endif" />
            <button class="Toevoegen" onclick="addMedia();closeModal('imageModal');return false;" style="margin-top:15px;">Add</button>
            <button class="close" style="margin-top: 15px;" onclick="closeModal('imageModal');return false;">Cancel</button>
        </div>
    </div>
    <a class="image" rel="group" href="@if(isset($entry)){{URL('/media/' . $entry['image'])}}@endif">
        <img id="imageview" style="max-width:25%;max-height:25%;padding-left:0%;" src="@if(isset($entry)){{URL('/media/' . $entry['image'])}}@else {{URL('images/empty.png')}}@endif" />
    </a>
</div>