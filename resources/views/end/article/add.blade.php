@extends('end.layout')

@section('title', '添加博客')

@section('css')
<link href="/editor.md/css/editormd.css" rel="stylesheet">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="/api/article/add" role="form" method="post">
            <div class="form-group">
                <label for="title" class="col-md-2 control-label">标题</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-md-2 control-label">文章内容</label>
                <div class="col-md-10" id="article-editormd">
                    <textarea class="form-control" id="content" name="content" placeholder=""></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-10 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">添加</button>
                </div>
            </div>
        </form>
    </div>
</div>
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
            path    : "/editor.md/lib/"
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