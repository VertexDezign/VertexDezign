@extends('layout/backend')
@section('content')
    <div class="pad">
        <?php
        if (isset($entry)){
        ?>
            {{--    EDIT  --}}
            {!! Form::open(array('route' => 'update_news','method' => 'post', 'files' => true)) !!}
                <p style="float:left;width:75%;margin-bottom:0px;font-style:italic;">You are edditing the following item:</p>
                <h3 style="float:left;width:90%;margin-top:0px;color:#515050;font-size:22px;weight:normal;">{{ $entry->title }}</h3>
                {!! Form::submit('Save') !!}

                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', $entry->title, array('placeholder' => 'Title', 'required' => 'required', 'class' => 'edit')) !!}

                <div>
                    <div style="float:right;width:85%;margin-bottom:8.5px;">{!! Form::textarea('body', $entry->body) !!}</div>
                    <div>{!! Form::label('desc', 'Body',['class' => 'max']) !!}</div>
                </div>

                {{--    HIDDEN  --}}
                {!! Form::hidden('id', $entry->id) !!}
                {!! Form::hidden('author_id', Auth::user()->id) !!}
                {!! Form::token() !!}
            {!! Form::close() !!}
        <?php
        }
        else{?>
            {{--    ADD  --}}
            {!! Form::open(array('route' => 'insert_news','method' => 'post', 'files' => true)) !!}
                <p style="float:left;width:75%;margin-bottom:0px;font-style:italic;">You are adding the following item:</p>
                <h3 style="float:left;width:90%;margin-top:0px;color:#515050;font-size:22px;weight:normal;">News item</h3>

                {!! Form::submit('Save') !!}

                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', '', array('placeholder' => 'Title', 'required' => 'required', 'class' => 'edit')) !!}

                <div>
                    <div style="float:right;width:85%;margin-bottom:8.5px;">{!! Form::textarea('body', '') !!}</div>
                    <div>{!! Form::label('desc', 'Body',['class' => 'max']) !!}</div>
                </div>

                {{--    HIDDEN  --}}
                {!! Form::hidden('id', '') !!}
                {!! Form::hidden('author_id', Auth::user()->id) !!}
                {!! Form::token() !!}
            {!! Form::close() !!}
        <?php
        }
        ?>
    </div>
    <script>
        tinymce.init({
            selector: "textarea",
            theme: "modern",
            resize: false,
            statusbar : false,
            height: 500,
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