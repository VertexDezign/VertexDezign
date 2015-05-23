@extends('layout/backend')
@section('content')
    <div class="pad">
        <?php
        if (isset($entry)){
        ?>
        <h3 class="h2">Edit: {{ $entry->title }}</h3>
        {!! Form::open(array('route' => 'update_project','method' => 'post', 'files' => true)) !!}
        <p>
            {!! Form::label('name', 'Name:') !!}<br>
            {!! Form::text('name', $entry->name) !!}
        </p>
        <p>
            {!! Form::label('title', 'Title:') !!}<br>
            {!! Form::text('title', $entry->title) !!}
        </p>
        <p>
            {!! Form::label('desc', 'Description:') !!}<br>
            {!! Form::textarea('desc', $entry->desc) !!}
        </p>
        <p>
            {!! Form::label('info', 'Information:') !!}<br>
            {!! Form::textarea('info', $entry->info) !!}
        </p>
        <p>
            {!! Form::label('features', 'Features:') !!}<br>
            {!! Form::textarea('features', $entry->features) !!}
        </p>
        <p>
            {!! Form::label('credits', 'Credits:') !!}<br>
            {!! Form::textarea('credits', $entry->credits) !!}
        </p>
        </p>
        {!! Form::hidden('id', $entry->id) !!}
        {!! Form::hidden('user_id', Auth::user()->id) !!}
        <p>
            {!! Form::submit('Save',['class' => 'btn blue']) !!}
        </p>
        {!! Form::token() !!}
        {!! Form::close() !!}
        <?php
        }
        else{?>
        <h3 class="h2">Add new</h3>
        {!! Form::open(array('route' => 'insert_project','method' => 'post', 'files' => true)) !!}
        <p>
            {!! Form::label('name', 'Name:') !!}<br>
            {!! Form::text('name', '') !!}
        </p>
        <p>
            {!! Form::label('title', 'Title:') !!}<br>
            {!! Form::text('title', '') !!}
        </p>
        <p>
            {!! Form::label('desc', 'Description:') !!}<br>
            {!! Form::textarea('desc', '') !!}
        </p>
        <p>
            {!! Form::label('info', 'Information:') !!}<br>
            {!! Form::textarea('info', '') !!}
        </p>
        <p>
            {!! Form::label('features', 'Features:') !!}<br>
            {!! Form::textarea('features', '') !!}
        </p>
        <p>
            {!! Form::label('credits', 'Credits:') !!}<br>
            {!! Form::textarea('credits', '') !!}
        </p>
        {!! Form::hidden('id', '') !!}
        {!! Form::hidden('user_id', Auth::user()->id) !!}
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