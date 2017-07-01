@extends('end.layout')

@section('title', '添加博客')

@section('css')
<link href="/editor.md/css/editormd.css" rel="stylesheet">
<style>
    .editormd-html-preview {
        width: 90%;
        margin: 0 auto;
    }

</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1>{{ $data['title'] }}</h1>
        <p>{{ $data['create_at'] }}</p>
        <div id="article-preview">
            <textarea id="append-test" style="display:none;">{{ $data['content'] }}</textarea>
        </div>
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
        var articlePreview, articlePreview2;

        $.get("test.md", function(markdown) {

            articlePreview = editormd.markdownToHTML("test-editormd-view", {
                markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
                //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                //toc             : false,
                tocm            : true,    // Using [TOCM]
                //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
                //gfm             : false,
                //tocDropdown     : true,
                // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true,  // 默认不解析
            });

            //console.log("返回一个 jQuery 实例 =>", articlePreview);

            // 获取Markdown源码
            //console.log(articlePreview.getMarkdown());

            //alert(articlePreview.getMarkdown());
        });

        articlePreview2 = editormd.markdownToHTML("article-preview", {
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