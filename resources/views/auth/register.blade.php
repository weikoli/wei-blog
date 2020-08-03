@extends('main')

@section('title','登入頁面')

@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <h2>註冊</h2>
            <hr style="margin-bottom:30px;">
            {!! Form::open() !!}
                {{ Form::label('name','您的名字',['style' => 'font-weight:bold']) }}
                {{ Form::text('name', null ,['class' => 'form-control','style' => 'margin-bottom:20px;']) }}
                
                {{ Form::label('email','郵件',['style' => 'font-weight:bold']) }}
                {{ Form::email('email',null,['class' => 'form-control','style' => 'margin-bottom:20px;']) }}
                
                {{ Form::label('password','密碼',['style' => 'font-weight:bold']) }}
                {{ Form::password('password',['class' => 'form-control','style' => 'margin-bottom:20px;']) }}
                
                {{ Form::label('password_confirmation','確認密碼',['style' => 'font-weight:bold']) }}
                {{ Form::password('password_confirmation',['class' => 'form-control'])}}
                <br>
                {{ Form::submit('註冊',['class' => 'btn btn-dark','style' => 'margin-left:90%;'])  }}
            {!! Form::close() !!}
        </div>
        <div class="col-md-3"></div>
    </div>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
