@extends('end.layout')

@section('title', '书签列表')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
          <caption></caption>
          <thead>
            <tr>
              <th>#</th>
              <th>标题</th>
              <th>链接</th>
              <th>文件夹</th>
              <th>添加时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($bookmark_list['data'] as $k => $bookmark)
            <tr>
              <td>{{ $k + 1 }}</td>
              <td>{{ $bookmark['name'] }}</td>
              <td><a href="{{ $bookmark['url'] }}" title="{{ $bookmark['desc'] }}" target="_blank">{{ $bookmark['url'] }}</a></td>
              <td>{{ $bookmark['dir_name'] }}</td>
              <td>{{ $bookmark['create_at'] }}</td>
              <td>
                  <a href="{{ route('bookmark_edit', ['id' => $bookmark['id']]) }}">编辑</a>
                  <a href="{{ route('bookmark_delete', ['id' => $bookmark['id']]) }}">删除</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        @if ($bookmark_list['total_page'] > 1)
            <ul class="pagination">
                <li class="<?php if ($bookmark_list['page'] <= 1) { echo 'disabled'; } ?>"><a href="{{ '?page=' . ($bookmark_list['page'] - 1) }}">&laquo;</a></li>
                @for ($i = 1; $i <= $bookmark_list['total_page']; $i++)
                    <li class="<?php if ($bookmark_list['page'] == $i) { echo 'active'; } ?>"><a href="{{ '?page=' . $i }}">{{ $i }}</a></li>
                @endfor
                <li class="<?php if ($bookmark_list['total_page'] == $bookmark_list['page']) { echo 'disabled'; } ?>"><a href="{{ '?page=' . ($bookmark_list['page'] + 1) }}">&raquo;</a></li>
            </ul>
        @endif
    </div>
</div>
@endsection