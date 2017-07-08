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
    <div class="col-md-7 col-md-offset-1">
        @foreach($articles['data'] as $k => $article)
            <?php $tagArray = explode('，', $article['tag']); ?>
            <div class="per-article">
                <h2><a href="{{ route('blog_view', ['id' => $article['id']]) }}">{{ $article['title'] }}</a></h2>
                <div class="info">
                    <span class="article-info">
                        <span class="glyphicon glyphicon-calendar"></span>
                        <span class="text-muted">{{ $article['create_at'] }}</span>
                    </span>
                    <span class="article-info">
                        @if (! empty($tagArray))
                            <span class="glyphicon glyphicon-tags"></span>
                        @endif
                        @foreach ($tagArray as $tag)
                            <a href="{{ route('blog_tag', ['tag' => $tag]) }}">{{ $tag }}</a>
                        @endforeach
                    </span>
                    <span class="article-info">
                        <span class="glyphicon glyphicon-eye-open"></span>
                        <span class="text-primary">{{ $article['read'] }}℃</span>
                    </span>
                </div>
                <div class="article-preview" id="article-{{ $article['id'] }}">
                    <br />
                    <p>{{ $article['abstract'] }}</p>
                    <!-- <textarea id="append-test">{{ $article['abstract'] }}</textarea> -->
                </div>
            </div>
            <hr>
        @endforeach
        @if ($articles['total_page'] > 1)
            <ul class="pagination">
                <li class="<?php if ($articles['page'] <= 1) { echo 'disabled'; } ?>"><a href="{{ '?page=' . ($articles['page'] - 1) }}">&laquo;</a></li>
                @for ($i = 1; $i <= $articles['total_page']; $i++)
                    <li class="<?php if ($articles['page'] == $i) { echo 'active'; } ?>"><a href="{{ '?page=' . $i }}">{{ $i }}</a></li>
                @endfor
                <li class="<?php if ($articles['total_page'] == $articles['page']) { echo 'disabled'; } ?>"><a href="{{ '?page=' . ($articles['page'] + 1) }}">&raquo;</a></li>
            </ul>
        @endif
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
        // var articlePreviews;

        // $(".article-preview").each(function(index, item) {
        //     editormd.markdownToHTML(item.id, {
        //         htmlDecode      : "style,script,iframe",  // you can filter tags decode
        //         emoji           : true,
        //         taskList        : true,
        //         tex             : true,  // 默认不解析
        //         flowChart       : true,  // 默认不解析
        //         sequenceDiagram : true,  // 默认不解析
        //     });
        // });
    });
</script>
@endsection