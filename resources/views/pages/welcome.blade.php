@extends('main')

@section('title', 'HomePage')

@section('stylesheets')
    <link rel="stylesheet" type="text/css" href="styles.css">
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1 class="display-4">Welcome to my Blog</h1>
                <p class="lead">My name is Vivian. Now a senior student in National Tsing-Hua University.</p>
                <hr class="my-4">
                <!-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
            </div>
        </div>
    </div>
        
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                    <div class="post">
                        <h3>{{ $post->title }}</h3>
                        <p>{{ substr($post->body, 0 , 30) }} {{ strlen($post->body) > 30 ? "..." : ""}}</p>
                        <a href="{{ url('blog/'.$post->slug) }}" class="btn btn-dark">查看更多</a>
                    </div>
                    <hr>
                @endforeach
            </div>
            <div class="col-md-3 col-md-offset-1">
                <h2>HELLO GUYS</h2>
                <img src="https://scontent-hkt1-2.xx.fbcdn.net/v/t1.0-9/126501444_1755468764619203_8666033330059557819_o.jpg?_nc_cat=105&ccb=2&_nc_sid=09cbfe&_nc_ohc=piunCj2SBK8AX8trMgA&_nc_ht=scontent-hkt1-2.xx&oh=6b7386b60ea146b7b4e1329176778bc0&oe=5FED7B0A" alt="VIVIAN" style="width:300px;height:300px;">
            </div>
        </div>
            
    </div>
@endsection

@section('scripts')
    <script src="js/sripts.js"></script>
@endsection