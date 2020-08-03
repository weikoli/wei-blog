@extends('main')

@section('title')
@section('content')
    {!! Auth::logout(); !!}
@endsection