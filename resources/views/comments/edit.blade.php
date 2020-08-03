@extends('main')

@section('title')

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
		<div class="col-md-8">
			<h1>編輯留言</h1>
			
			{{ Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) }}
			
				{{ Form::label('name', '名字:') }}
				{{ Form::text('name', null, ['class' => 'form-control', 'disabled' => '']) }}
			
				{{ Form::label('email', '郵件:') }}
				{{ Form::text('email', null, ['class' => 'form-control', 'disabled' => '']) }}
			
				{{ Form::label('comment', '留言內容:') }}
				{{ Form::textarea('comment', null, ['class' => 'form-control']) }}
			
				{{ Form::submit('確定', ['class' => 'btn btn-block btn-dark', 'style' => 'margin-top: 15px;']) }}
			
			{{ Form::close() }}
		</div>
        <div class="col-md-2"></div>
	</div>

@endsection