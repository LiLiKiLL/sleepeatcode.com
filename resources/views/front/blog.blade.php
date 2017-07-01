@extends('front.layout')

@section('css')
<link href="/css/blog.css" rel="stylesheet">
<link href="/editor.md/css/editormd.css" rel="stylesheet">
@endsection

@section('content')
<div class="row full-width-row article-title">
    <h2>Welcome</h2>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-1">
        @foreach($data['data'] as $k => $blog)
            <div class="per-article">
                <h2><a href="{{ route('blog_view', ['id' => $blog['id']]) }}">{{ $blog['title'] }}</a></h2>
                <div class="info">
                    <span class="text-muted">{{ $blog['create_at'] }}</span>
                </div>
                <div class="article-preview" id="article-{{ $blog['id'] }}">
                    <textarea id="append-test">{{ $blog['abstract'] }}</textarea>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
    <div class="col-md-2 col-md-pull-1">

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
        var articlePreviews;

        $(".article-preview").each(function(index, item) {
            editormd.markdownToHTML(item.id, {
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true,  // 默认不解析
            });
        });
    });
</script>
@endsection