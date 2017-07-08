@extends('end.layout')

@section('title', '格言列表')

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
          <caption></caption>
          <thead>
            <tr>
              <th>编号</th>
              <th>格言内容</th>
              <th>作者/来源</th>
              <th>添加时间</th>
              <th>更新时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['data'] as $k => $motto)
            <tr>
              <td>{{ $k + 1 }}</td>
              <td>{{ $motto['content'] }}</td>
              <td>{{ $motto['author'] }}</td>
              <td>{{ $motto['create_at'] }}</td>
              <td>{{ $motto['update_at'] }}</td>
              <td>
                  <a href="{{ route('motto_edit', ['id' => $motto['id']]) }}">编辑</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection
