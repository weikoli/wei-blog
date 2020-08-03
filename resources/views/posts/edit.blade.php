@extends('main')

@section('title','Edit post')
@section('content')
    <div class="row">
        <div class="col-md-8">
        <!-- <input type="hidden" value="{{$post->id}}" name="id"> -->
            {!! Form::model($post, ['route' => ['posts.update',$post->id], 'method'=>'PUT' ,'files'=>true]) !!}
            
            {{ Form::label('title', '標題', ['class' => 'form-title']) }}
            {{ Form::text('title', null, ['class' => 'form-control']) }}

            {{ Form::label('category_id', '類別', ['class' => 'form-title']) }}
            {{ Form::select('category_id',$categories,null,['class' => 'form-control']) }}
            
            {{ Form::label('slug','網址tag:', ['class' => 'form-body']) }}
            {{ Form::text('slug', null, ['class' => 'form-control']) }}
            <br>
            {{ Form::label('featured_image','圖片',['class' => 'form-title'])}}
            {{ Form::file('featured_image')}}
            <br>

            {{ Form::label('body','內文', ['class' => 'form-body']) }}
            {{ Form::textarea('body', null, ['class' => 'form-control']) }}
        
        </div>
        
        <div class="col-md-4">
            <div style="padding:30px 20px 10px 20px;background-color:#DDDDDD;">
                <dl class="dl-horizontal">
                    <dt>創立於:</dt>                    
                    <dd>{{ date('Y/m/j , H:i',strtotime($post->created_at)) }}</dd>
                <dl>
                <dl class="dl-horizontal">
                    <dt>上次更新於:</dt>                    
                    <dd>{{ date('Y/m/j , H:i', strtotime($post->updated_at)) }}</dd>
                <dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {{ Form::submit('儲存',['class'=>'btn btn-success btn-block']) }}
                    </div>
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show', '取消', array($post->id), array('class' => 'btn btn-danger btn-block')) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        
    </div>
    <!-- end of the form -->

@stop

