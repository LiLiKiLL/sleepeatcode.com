@extends('front.layout')

@section('title', 'Bookmark-')

@section('content')

<div class="row">
    <div class="col-md-12">
        @foreach($dir_bookmark_list as $k => $firstLevelDirInfo)
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <p><strong>{{ $firstLevelDirInfo['name'] }}</strong></p>
                    <hr>
                </div>
            </div>
            @foreach ($firstLevelDirInfo['children'] as $key => $secondLevelDirInfo)
                <div class="row">
                    <div class="col-md-1 col-md-offset-1">
                        <p>{{ $secondLevelDirInfo['name'] }}</p>
                    </div>
                    <div class="col-md-9">
                        @foreach ($secondLevelDirInfo['bookmark_list'] as $i => $bookmarkInfo)
                            <a href="{{ $bookmarkInfo['url'] }}" title="{{ $bookmarkInfo['desc'] }}">{{ $bookmarkInfo['name'] }}</a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>
@endsection