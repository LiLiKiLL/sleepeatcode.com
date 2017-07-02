<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">标签</h3>
            </div>
            <div class="panel-body">
                @foreach ($tags as $k => $tag)
                    <a href="{{ route('blog_tag', ['tag' => $tag]) }}" style="margin-right:8px;">{{ $tag }}</a>
                @endforeach
            </div>
        </div>
    </div>
</div>