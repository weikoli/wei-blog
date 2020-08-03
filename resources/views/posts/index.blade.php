@extends('main')

@section('title','All posts')

@section('content')

    
    <div class="row">
        <div class="col-md-10">
            <h1>所有貼文</h1>
        </div>

        <div class="col-md-2">
            <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-color">新增文章</a>
        </div>
        <div class="col-md-12" style="margin-bottom:20px;">
            <!-- <hr> -->
        </div>
    </div> <!--end of .row -->

    <div class="row" style="margin-top:20px;">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <!-- <th>#</th> -->
                    <th>標題</th>
                    <th>內文</th>
                    <th>創立於</th>
                    <th>上次更新於</th>
                    <th><th>
                </thead>
                <tbody>

                    @foreach ($posts as $post)

                        <tr>
                            <!-- <th>{{ $post -> id }}</th> -->
                            <td>{{ $post -> title }}</td>
                            <td>{{ substr($post -> body, 0, 30) }} {{ strlen($post->body) > 30 ? "..." : "" }}</td>
                            <td>{{ date('Y/m/j, H:i', strtotime($post->created_at)) }}</td>
                            <td>{{ date('Y/m/j, H:i', strtotime($post->updated_at)) }}</td>
                            <td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-dark btn-index">查看</a>
                            <?php $user = Auth::user();?>
                            @if ($post->user_name == $user->name)
                                <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-secondary btn-index">編輯</a></td>
                            @endif
                        </tr>

                    @endforeach
                </tbody>
            </table>
            <div>
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>

@stop