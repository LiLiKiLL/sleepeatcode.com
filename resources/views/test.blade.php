@extends('common.layout')

@section('css')
<link rel="stylesheet" href="/editor.md/css/editormd.min.css" />
@endsection

@section('content')
<div id="editormd">
    <textarea style="">### Hello Editor.md !</textarea>
</div>
@endsection

@section('js')
<script src="/editor.md/editormd.min.js"></script>
<script type="text/javascript">
    $(function() {
        var editor = editormd("editormd", {
            path : "/editor.md/lib/" // Autoload modules mode, codemirror, marked... dependents libs path
        });

        /*
        // or
        var editor = editormd({
            id   : "editormd",
            path : "../lib/"
        });
        */
    });
</script>
@endsection