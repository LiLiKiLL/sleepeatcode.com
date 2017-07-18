@extends('end.layout')

@section('title', '添加书签文件夹')

@section('content')
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="" role="form" method="post">
            <div class="form-group">
                <label for="pid" class="col-sm-2 control-label">父级文件夹</label>
                <div class="col-sm-10">
                    <select class="form-control" name="pid">
                      <option value="0">根文件夹</option>
                      @foreach ($first_level_dir_list as $k => $dir_info)
                          <option value="{{ $dir_info['id'] }}">{{ $dir_info['name'] }}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">文件夹名称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="submit" class="btn btn-primary">添加</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection