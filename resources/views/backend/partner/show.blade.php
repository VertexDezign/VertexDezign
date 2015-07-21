@extends('layout/backend')
@section('content')
    <div class="edit-header" style="background-color:#f1f4f9;padding:2px;border-bottom:1px solid #dee2e8;">
        <p>Backend / <span style="color:#0AA699;">Partner</span> / @if(isset($entry)) Edit @else Add @endif</p>
    </div>
    <div class="edit-header" style="background-color:#e9edf2;border-bottom:1px solid #dee2e8;">
        <div style="float:left;margin-left:25px;margin-top:15px;"><img src="{{URL('/images/backend/addContent.png')}}"></div><h1 style="float:left;margin-left:10px;">@if(isset($entry)) Edit @else Add @endif slide</h1>
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
        <form method="post" role="post" action="@if(isset($entry)){{route('update_partner')}}@else{{route('insert_partner')}}@endif">
            <!-- Slide title -->
            <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">Title</label></div>
            <div class="three-two">
                <input name="title" placeholder="Title" type="text" value="@if(isset($entry)){{$entry['title']}}@endif" REQUIRED />
            </div>
            <div style="clear:both;"></div>
            <!-- Slide link -->
            <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">Link</label></div>
            <div class="three-two">
                <input name="link" placeholder="Link" type="text" value="@if(isset($entry)){{$entry['link']}}@endif" REQUIRED />
            </div>
            <div style="clear:both;"></div>
            <!-- Slide image -->
            <div class="three" style="width:85%;"><label class="basic-label" style="margin-bottom:8.5px;">Image preview</label></div>
            <input type="button" name="Add" value="Set image" class="btn red" style="float:right;width:15%;margin:0px;padding:12.5px;" onclick="openModal('imageModal')">
            <div class="three" style="width:100%;">
                <div class="modal blue" id="imageModal" style="height: 350px;bottom:-350px;">
                    <div class="two">
                        <select id="imageselect" name="image" style="width:100%;margin-top:15px;" onchange="changeImage(this.value);">
                            <?php
                            foreach($files as $file){
                                $selected = '';
                                $ex = $file->getExtension();
                                if(!$file->isDot() && $ex=='png' || $ex=='jpg' || $ex=='gif'){
                                    if(isset($entry) && $file == $entry->image){
                                        $selected = "selected";
                                    }
                                    echo '<option '.$selected.'>'.$file.'</option>';
                                }
                            }
                            ?>
                        </select>
                        <img class="imageview" style="width:50%;height:50%;padding-left:0%;" src="@if(isset($entry)){{URL('/media/' . $entry['image'])}}@endif" />
                    </div>
                    <div class="two">
                        <button class="Toevoegen" onclick="addImage();closeModal('imageModal');return false;" style="margin-top:15px;">Add</button>
                        <button class="close" style="margin-top: 15px;" onclick="closeModal('imageModal');return false;">Cancel</button>
                    </div>
                </div>
                <a class="image" rel="group" href="@if(isset($entry)){{URL('/media/' . $entry['image'])}}@endif">
                    <img id="imageview" style="width:25%;height:25%;padding-left:0%;" src="@if(isset($entry)){{URL('/media/' . $entry['image'])}}@endif" />
                </a>
            </div>
            <div style="clear:both;"></div>


            @if(isset($entry))
                <input type="hidden" name="id" value="{{$entry->id}}">
            @endif
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
            <hr/>

            <div style="background-color: #f1f1f1;padding:2px;height:55px;width:100%;">
                <div style="margin:0 auto;width:200px;">
                    <input type="submit" name="Save" value="Save" class="btn blue">
                    <input type="button" name="Cancel" value="Cancel" class="btn red" onclick="">
                </div>
            </div>
            <div style="background-color:#ccc;height:5px;"></div>
        </form>
    </div>
@endsection