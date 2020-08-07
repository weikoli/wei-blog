@extends('main')

@section('title','Create new posts')

@section('content')

    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>創建新文章</h1>
            <hr>
            {!! Form::open(array('route' => 'posts.store' , 'data-parsley-validate' => '' ,'files' => true)) !!}
                {{ Form::label('title','標題') }}             
                {{ Form::text('title',null,array('class' => 'form-control')) }}             
                <br>
                {{ Form::label('slug','網址tag:(英文)')}}
                {{ Form::text('slug',null,array('class' => 'form-control', 'required' => '','minlength'=>'3','maxlength'=>'255')) }}

                {{ Form::label('category_id','類別')}}
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <br>
                {{ Form::label('featured_image','上傳圖片') }}
                <br>
                {{ Form::file('featured_image')}}
                <br><br>
                {{ Form::label('body','文章內容') }}             
                {{ Form::textarea('body',null,array('class' => 'form-control')) }}

                {{ Form::submit('新增', array('class' => 'btn btn-dark btn-lg btn-block', 'style' => 'margin-top:20px;')) }}
            {!! Form::close() !!}
        </div>
        <div class="col-md-2"></div>
    </div>

@endsection