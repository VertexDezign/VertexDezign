@extends('layout/backend')
@section('content')
    <div class="pad">
        <?php
        if (isset($entry)){
        ?>
        <h3 class="h2">Edit: {{ $entry->title }}</h3>
        {!! Form::open(array('route' => 'update_news','method' => 'post', 'files' => true)) !!}
        <p>
            {!! Form::label('title', 'Title:') !!}<br />
            {!! Form::text('title', $entry->title) !!}
        </p>
        <p>
            {!! Form::textarea('body', $entry->body) !!}
        </p>
        {!! Form::hidden('id', $entry->id) !!}
        {!! Form::hidden('author_id', Auth::user()->id) !!}
        <p>
            {!! Form::submit('Save',['class' => 'btn blue']) !!}
        </p>
        {!! Form::token() !!}
        {!! Form::close() !!}
        <?php
        }
        else{?>
        <h3 class="h2">Add new</h3>
        {!! Form::open(array('route' => 'insert_news','method' => 'post', 'files' => true)) !!}
        <p>
            {!! Form::label('title', 'Title:') !!}<br />
            {!! Form::text('title', '') !!}
        </p>
        <p>
            {!! Form::textarea('body', '') !!}
        </p>
        {!! Form::hidden('id', '') !!}
        {!! Form::hidden('author_id', Auth::user()->id) !!}
        <p>
            {!! Form::submit('Save',['class' => 'btn blue']) !!}
        </p>
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
            forced_root_block : "",
            force_br_newlines : true,
            force_p_newlines : false,
            height: 800,
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