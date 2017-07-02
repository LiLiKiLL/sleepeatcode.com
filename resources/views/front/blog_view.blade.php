@extends('front.layout')

@section('title', $data['title'] . '-')

@section('css')
<link href="/css/blog.css" rel="stylesheet">
<link href="/editor.md/css/editormd.css" rel="stylesheet">
@endsection

@section('content')
<div class="row full-width-row article-title">
    <div class="col-md-12">
        <h2 class="text-center" style="margin-bottom:20px;">{{ $data['title'] }}</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-7 col-md-offset-1">
        <div class="per-article">
            <div id="article-preview">
                <textarea id="append-test" style="display:none;">{{ $data['content'] }}</textarea>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        @include('front.me')
        @include('front.tags')
        @include('front.links')
    </div>
</div>
@endsection

@section('js')
<script src="/editor.md/lib/marked.min.js"></script>
<script src="/editor.md/lib/prettify.min.js"></script>

<script src="/editor.md/lib/raphael.min.js"></script>
<script src="/editor.md/lib/underscore.min.js"></script>
<script src="/editor.md/lib/sequence-diagram.min.js"></script>
<script src="/editor.md/lib/flowchart.min.js"></script>
<script src="/editor.md/lib/jquery.flowchart.min.js"></script>

<script src="/editor.md/editormd.js"></script>
<script type="text/javascript">
    $(function() {
        var articlePreview;

        articlePreview = editormd.markdownToHTML("article-preview", {
            htmlDecode      : "style,script,iframe",  // you can filter tags decode
            emoji           : true,
            taskList        : true,
            tex             : true,  // 默认不解析
            flowChart       : true,  // 默认不解析
            sequenceDiagram : true,  // 默认不解析
        });
    });
</script>
@endsection