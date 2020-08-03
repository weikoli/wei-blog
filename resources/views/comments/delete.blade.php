@extends('main')

@section('title','刪除留言')

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h2>確定要刪除留言?</h2>
            <p>
				<strong>名字:</strong> {{ $comment->name }}<br>
				<strong>郵件:</strong> {{ $comment->email }}<br>
				<strong>留言內容:</strong> {{ $comment->comment }}
			</p>

			{{ Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'DELETE']) }}
				{{ Form::submit('確定刪除', ['class' => 'btn btn-lg btn-block btn-danger']) }}
			{{ Form::close() }}
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection