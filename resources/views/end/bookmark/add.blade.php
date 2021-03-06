@extends('end.layout')

@section('title', '添加书签')


@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="" role="form" method="post">
            <div class="form-group">
                <label for="title" class="col-md-2 control-label">标题</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="title" name="title" placeholder="20个字以内">
                </div>
            </div>
            <div class="form-group">
                <label for="abstract" class="col-md-2 control-label">摘要</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="abstract" name="abstract"></textarea>
                    <p class="help-block">54个字以内</p>
                </div>
            </div>
            <div class="form-group">
                <label for="tag" class="col-md-2 control-label">标签</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="tag" name="tag" placeholder="逗号分隔">
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-md-2 control-label">正文</label>
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