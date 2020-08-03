@extends('main')

@section('title', 'About')

@section('content')
    <div class="content">
        <div class="title m-b-md">
            <h1>About {{ $data['fullname'] }}</h1>
        </div>
        <h3>{{ $data['major'] }}</h3>
    </div>
    <!-- <div class="row">
        <div class="col-md-6">
            <img src="" alt="">
        </div>
        <div class="col-md-6"></div>
    </div> -->
@endsection

                