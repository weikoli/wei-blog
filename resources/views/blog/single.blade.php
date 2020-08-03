@extends('main')
<?php $titleTag = htmlspecialchars($posts->title); 
      list($width, $height) = getimagesize(public_path('images\\' . $posts->image));
?>
@section('title','$titleTag')
@section('content')
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" style="align-items:flex-start;">
            <h1>{{ $posts->title }}</h1>
            <hr>
            
            
            @if ($width > $height)
                <img src="{{ asset('images/' . $posts->image) }}" alt="image" style="width:800px;height:450px;">
            @else
                <img src="{{ asset('images/' . $posts->image) }}" alt="image" style="width:400px;height:600px;">
            @endif
            
            
            
            <br><br>
            <h3>{{ $posts->body }}</h3>
            <br><br><br>
            <p style="font-weight:bold;">類別:</p>
            <p style="font-style:italic;"> #{{ $posts->category->name }}</p>
        </div>
        
        <div class="col-md-2"></div>
    </div>

    <div class="row" style="margin-top:130px;">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            
            <h2>留言區</h2><hr><br>
            <h4 style="margin-top:20px;text-align:center;"><svg style="margin:0 13px 5px 0;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chat-text-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path fill-rule="evenodd" d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
</svg>{{ $posts->comments()->count()}}則留言</h4>
            <div style="padding:20px;">
                <br>
                @foreach($posts->comments as $comment)
                    <div class="comment">
                        <div class="author-info">
                        <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($comment->email))) . '?s=80&d=robohash' }}"  class="author-img" alt="">
                            <div class="author-name">
                                <p style="font-size:20px;font-weight:bold">{{ $comment->name}}</p>
                                <div class="author-time">
                                    <p>{{ $comment->created_at }}</p>
                                </div>
                            </div>
                            <div class="comment-content">
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                        
                    </div>


                @endforeach
                <!-- @if ($posts->comments)
                    @foreach($posts->comments as $comment)
                    <p style="font-weight:bold;">{{ $comment->name }} :</p>
                    <p>{{ $comment->comment}}</p>
                    <hr><br>
                    @endforeach

                @else   
                    <p style="font-size:20px;">還沒有人留言喔~~~</p>            
                @endif -->
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row" style="margin-top:100px;">
        <div class="col-md-2"></div>
        <div id="comment-form" class="col-md-8">
            <h2>寫下你的留言</h2>
            {{ Form::open(['route' => ['comments.store', $posts->id],'method' => 'POST']) }}
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name','名字')}}
                        {{ Form::text('name',null,['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('email','郵件')}}
                        {{ Form::text('email',null,['class' => 'form-control']) }}
                    </div>
                    <div class="col-md-12">
                        {{ Form::label('comment','留言')}}
                        {{ Form::textarea('comment',null,['class' => 'form-control','rows' => '4'])}}
                        <br>
                        {{ Form::submit('確定',['class' => 'btn btn-dark', 'style' => 'margin-left:90%;'])}}
                    </div>
                </div>

            {{ Form::close() }}
        </div>
        <div class="col-md-2"></div>
    </div>

    <style>
        .comment {
            margin-bottom:40px;
        }
        .author-img {
            width:80px;
            height:80px;
            border-radius: 50%;
            float:left;
            margin-top:15px;
        }
        .author-name{
            float:left;
            margin-left:20px;
        }
        .author-name p{
            margin:8px 0;
        }
        .author-time{
            font-style:ilatic;
            font-size:13px;
            color:#aaa;
        }
        .comment-content{
            clear:both;
            margin-top:20px;
            margin-left:100px;
            letter-spacing:1.2px;
            line-height:1rem;
        }

    </style>
@stop