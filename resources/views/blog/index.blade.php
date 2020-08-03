@extends('main')

@section('title','Blog')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h1 style="text-align:center;">Blog</h1>
        </div>
    </div>

    @foreach ($posts as $post)
        <div class="row" style="margin-top:40px;">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h2>{{ $post->title }}</h2>
                <h5>發佈時間: {{ date('Y/m/j, H:i', strtotime($post->created_at)) }}</h5>
                <p>{{ substr($post->body,0,30) }}{{ strlen($post->body) > 30 ? "..." : "" }}</p>

                <a href="{{ route('blog.single', $post->slug) }}" class="btn btn-dark">查看更多</a>
                <hr style="margin-top:40px;">
            </div>
            <div class="col-md-2"></div>
        </div>
    @endforeach

    <div class="row" style="margin-top:100px;margin-left:45%;margin-right:55%;">
        <div class="col-md-12">
            <div style="text-align:center">
                {!! $posts->links() !!}
            </div>
        </div>
    </div>

@endsection