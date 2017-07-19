@extends('end.layout')

@section('title', '添加博客')

@section('css')
<link href="/editor.md/css/editormd.css" rel="stylesheet">
@endsection

@section('content')
<form class="form-horizontal" action="" role="form" method="post">
    <div class="form-group">
        <label for="title" class="col-md-1 control-label">标题</label>
        <div class="col-md-11">
            <input type="text" class="form-control" id="title" name="title" placeholder="">
        </div>
    </div>
    <div class="form-group">
        <label for="abstract" class="col-md-1 control-label">摘要</label>
        <div class="col-md-11">
            <textarea class="form-control" id="abstract" name="abstract"></textarea>
            <!-- <p class="help-block">54个字以内</p> -->
        </div>
    </div>
    <div class="form-group">
        <label for="tag" class="col-md-1 control-label">标签</label>
        <div class="col-md-11">
            <input type="text" class="form-control" id="tag" name="tag" placeholder="逗号分隔">
        </div>
    </div>
    <div class="form-group">
        <label for="content" class="col-md-1 control-label">正文</label>
        <div class="col-md-11" id="article-editormd">
            <textarea class="form-control" id="content" name="content" placeholder=""></textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-11 col-md-offset-2">
            <button type="submit" class="btn btn-primary">添加</button>
        </div>
    </div>
</form>
@endsection

@section('js')
<script src="/editor.md/editormd.min.js"></script>
<script type="text/javascript">
    var articleEditormd;

    $(function() {
        articleEditormd = editormd("article-editormd", {
            width   : "80%",
            height  : 640,
            syncScrolling : "single",
            path    : "/editor.md/lib/",
            imageUpload : true,
            imageFormats : ["jpg", "jpeg", "gif", "png", "bmp", "webp"],
            imageUploadURL : "{{ route('upload_image') }}",
            saveHTMLToTextarea : true
        });

        /*
        // or
        article-editormd = editormd({
            id      : "article-editormd",
            width   : "90%",
            height  : 640,
            path    : "../lib/"
        });
        */
    });
</script>
@endsection