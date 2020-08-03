@extends('main')

@section('title','類別')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <h1>類別</h1>
            <table class="table">
                <thead>
                    <tr>
                        <!-- <th>#</th> -->
                        <th>名稱</th>
                    
                    </tr>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <!-- <th>{{ $category->id }}</th> -->
                                <td style="text-align:center">{{ $category->name }}</td>
                            </tr>

                        @endforeach
                    </tbody>
                </thead>
            </table>

        </div>
        <div class="col-md-3">
            {!! Form::open(['route' => 'categories.store']) !!}
                <h2>創建類別</h2>
                {{ Form::label('name','類別名稱')  }}
                {{ Form::text('name',null,['class' => 'form-control']) }}

                {{ Form::submit('確定',['class' => 'btn btn-dark','style' => 'margin-top:20px; margin-left:78%;']) }}
            {!! Form::close() !!}
        </div>
    </div>

@endsection