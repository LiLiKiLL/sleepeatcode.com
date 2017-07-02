@extends('end.layout')

@section('title', '博客列表')

@section('css')
<link href="/editor.md/css/editormd.css" rel="stylesheet">
<style>
    th {
        background-color: #f7f7f7;
    }
</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <table class="table table-bordered">
          <caption>边框表格布局</caption>
          <thead>
            <tr>
              <th>编号</th>
              <th>标题</th>
              <th>摘要</th>
              <th>标签</th>
              <th>添加时间</th>
              <th>更新时间</th>
              <th>操作</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data['data'] as $k => $article)
            <tr>
              <td>{{ $k + 1 }}</td>
              <td>{{ $article['title'] }}</td>
              <td>{{ $article['abstract'] }}</td>
              <td>{{ $article['tag'] }}</td>
              <td>{{ $article['create_at'] }}</td>
              <td>{{ $article['update_at'] }}</td>
              <td>
                  <a href="{{ route('article_preview', ['id' => $article['id']]) }}">预览</a>
                  <a href="{{ route('article_edit', ['id' => $article['id']]) }}">编辑</a>
                  <a href="{{ route('article_delete', ['id' => $article['id']]) }}">删除</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
</div>
@endsection
