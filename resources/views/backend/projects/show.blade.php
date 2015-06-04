@extends('layout/backend')
@section('content')
    <div class="pad">
        <?php
        if (isset($entry)){
        ?>
            {{--    EDIT  --}}
            {!! Form::open(array('route' => 'update_project','method' => 'post', 'files' => true)) !!}
                <p style="float:left;width:75%;margin-bottom:0px;font-style:italic;">You are edditing the following item:</p>
                <h3 style="float:left;width:90%;margin-top:0px;color:#515050;font-size:22px;weight:normal;">{{ $entry->title }}</h3>

                {!! Form::submit('Save',['class' => 'btn blue']) !!}

                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', $entry->name, array('required' => 'required', 'class' => 'edit')) !!}

                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', $entry->title, array('required' => 'required', 'class' => 'edit')) !!}

                <div>
                    <div style="float:right;width:85%;margin-bottom:8.5px;">{!! Form::textarea('desc', $entry->desc) !!}</div>
                    <div>{!! Form::label('desc', 'Description',['class' => 'min']) !!}</div>
                </div>
                <div>
                    <div style="float:right;width:85%;margin-bottom:8.5px;">{!! Form::textarea('info', $entry->info) !!}</div>
                    <div>{!! Form::label('info', 'Information',['class' => 'min']) !!}</div>
                </div>
                <div>
                    <div style="float:right;width:85%;margin-bottom:8.5px;">{!! Form::textarea('features', $entry->features) !!}</div>
                    <div>{!! Form::label('features', 'Features',['class' => 'min']) !!}</div>
                </div>
                <div>
                    <div style="float:right;width:85%;margin-bottom:8.5px;">{!! Form::textarea('credits', $entry->credits) !!}</div>
                    <div>{!! Form::label('credits', 'Credits',['class' => 'min']) !!}</div>
                </div>

                {{--    HIDDEN  --}}
                {!! Form::hidden('id', $entry->id) !!}
                {!! Form::hidden('user_id', Auth::user()->id) !!}
                {!! Form::token() !!}
            {!! Form::close() !!}
        <?php
        }
        else{?>
            {{--    ADD  --}}
            {!! Form::open(array('route' => 'insert_project','method' => 'post', 'files' => true)) !!}
                <p style="float:left;width:75%;margin-bottom:0px;font-style:italic;">You are adding the following item:</p>
                <h3 style="float:left;width:90%;margin-top:0px;color:#515050;font-size:22px;weight:normal;">Project</h3>
                {!! Form::submit('Save',['class' => 'btn blue']) !!}

                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name', '', array('placeholder' => 'Name', 'required' => 'required', 'class' => 'edit')) !!}

                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', '', array('placeholder' => 'Title', 'required' => 'required', 'class' => 'edit')) !!}

                <div>
                    <div style="float:right;width:85%;margin-bottom:8.5px;">{!! Form::textarea('desc', '') !!}</div>
                    <div>{!! Form::label('desc', 'Description',['class' => 'min']) !!}</div>
                </div>
                <div>
                    <div style="float:right;width:85%;margin-bottom:8.5px;">{!! Form::textarea('info', '') !!}</div>
                    <div>{!! Form::label('info', 'Information',['class' => 'min']) !!}</div>
                </div>
                <div>
                    <div style="float:right;width:85%;margin-bottom:8.5px;">{!! Form::textarea('features', '') !!}</div>
                    <div>{!! Form::label('features', 'Features',['class' => 'min']) !!}</div>
                </div>
                <div>
                    <div style="float:right;width:85%;margin-bottom:8.5px;">{!! Form::textarea('credits', '') !!}</div>
                    <div>{!! Form::label('credits', 'Credits',['class' => 'min']) !!}</div>
                </div>

                {{--    HIDDEN  --}}
                {!! Form::hidden('id', '') !!}
                {!! Form::hidden('user_id', Auth::user()->id) !!}
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
            menubar : false,
            height: 200,
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