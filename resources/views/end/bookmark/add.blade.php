@extends('end.layout')

@section('title', '添加书签')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="" role="form" method="post">
            <div class="form-group">
                <label for="dir_id" class="col-sm-2 control-label">选择文件夹</label>
                <div class="col-sm-10">
                    <select class="form-control" name="dir_id">
                      @foreach ($dir_list as $k => $dir_info)
                          <option value="{{ $dir_info['id'] }}" disabled="true" style="font-size:1.3em;font-weight:700;">{{ $dir_info['name'] }}</option>
                          @foreach ($dir_info['children'] as $key => $child_dir_info)
                              <option value="{{ $child_dir_info['id'] }}" style="margin-left:20px;">{{ $child_dir_info['name'] }}</option>
                          @endforeach
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-md-2 control-label">标题</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="name" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="url" class="col-md-2 control-label">链接</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="url" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="desc" class="col-md-2 control-label">描述</label>
                <div class="col-md-10" id="article-editormd">
                    <textarea class="form-control" name="desc"></textarea>
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