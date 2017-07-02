@extends('front.layout')

@section('title', 'Blog-')

@section('css')
<link href="/css/blog.css" rel="stylesheet">
<link href="/editor.md/css/editormd.css" rel="stylesheet">
@endsection

@section('content')
<div class="row full-width-row article-title">
    <div class="col-md-12">
        <h2 class="text-center" style="margin-bottom:20px;">Welcome</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-8 col-md-offset-1">
        @foreach($data['data'] as $k => $blog)
            <?php $tagArray = explode('，', $blog['tag']); ?>
            <div class="per-article">
                <h2><a href="{{ route('blog_view', ['id' => $blog['id']]) }}">{{ $blog['title'] }}</a></h2>
                <div class="info">
                    <span class="article-info">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <span class="text-muted">{{ $blog['create_at'] }}</span>
                    </span>
                    <span class="article-info">
                        @if (! empty($tagArray))
                            <span class="glyphicon glyphicon-tags"></span>
                        @endif
                        @foreach ($tagArray as $tag)
                            <a href="#">{{ $tag }}</a>
                        @endforeach
                    </span>
                    <span class="article-info">
                        <span class="glyphicon glyphicon-eye-open"></span>
                        <span class="text-primary">{{ $blog['read'] }}views</span>
                    </span>
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