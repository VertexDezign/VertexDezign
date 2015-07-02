@extends('layout/backend')
@section('content')
    <div class="edit-header" style="background-color:#f1f4f9;padding:2px;border-bottom:1px solid #dee2e8;">
        <p>Backend / <span style="color:#0AA699;">Slider</span> / @if(isset($entry)) Edit @else Add @endif</p>
    </div>
    <div class="edit-header" style="background-color:#e9edf2;border-bottom:1px solid #dee2e8;">
        <div style="float:left;margin-left:25px;margin-top:15px;"><img src="{{URL('/images/backend/addContent.png')}}"></div><h1 style="float:left;margin-left:10px;">@if(isset($entry)) Edit @else Add @endif slide</h1>
        <div style="clear:both;"></div>
    </div>
    <div class="pad">
        @if (Session::has('error'))
            <p class="error">{{Session::get('error')}}</p>
        @elseif (Session::has('succes'))
            <p class="succes">{{Session::get('succes')}}</p>
        @endif
        <form method="post" role="post" action="@if(isset($entry)){{route('update_slider')}}@else{{route('insert_slider')}}@endif">
            <!-- Slide title -->
            <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">Title</label></div>
            <div class="three-two">
                <input name="title" placeholder="Title" type="text" value="@if(isset($entry)){{$entry['title']}}@endif" REQUIRED />
            </div>
            <div style="clear:both;"></div>
            <!-- Slide body -->
            <div class="three" style="width:calc(100% - 15px);"><label class="basic-label" style="margin-bottom:8.5px;">Description</label></div>
            <div class="three-two" style="width:100%;margin-bottom:8.5px;">
                <textarea name="desc">@if(isset($entry)){{$entry['desc']}}@endif</textarea>
            </div>
            <div style="clear:both;"></div>
            <!-- Slide link -->
            <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">Link</label></div>
            <div class="three-two">
                <input name="link" placeholder="Link" type="text" value="@if(isset($entry)){{$entry['link']}}@endif" REQUIRED />
            </div>
            <div style="clear:both;"></div>
            <!-- Slide image -->
            <div class="three"><label class="basic-label" style="margin-bottom:8.5px;">Image</label></div>
            <div class="three-two">
                <input name="image" placeholder="Image" type="text" value="@if(isset($entry)){{$entry['image']}}@endif" REQUIRED />
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
    <script>
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            resize: false,
            statusbar : false,
            height: 250,
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
            toolbar2: "print preview media | forecolor backcolor emoticons",
            image_advtab: true,
            templates: [
                {title: 'Test template 1', content: 'Test 1'},
                {title: 'Test template 2', content: 'Test 2'}
            ]
        });
    </script>
@endsection