@extends('end.layout')

@section('title', '添加格言')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="" role="form" method="post">
            <div class="form-group">
                <label for="author" class="col-md-2 control-label">作者/来源</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="author" name="author" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="content" class="col-md-2 control-label">格言内容</label>
                <div class="col-md-10">
                    <textarea class="form-control" id="content" name="content"></textarea>
                    <p class="help-block"></p>
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