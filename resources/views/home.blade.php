


@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!-- partial -->
    @include('partials/_head')
    
    <body>
        @include('partials/_nav')
        <div class="container" style="margin-top:100px;">
            @include('partials/_message')

            {{ Auth::check() ? "登入" : "登出" }}

            @yield('content')
        </div>            
        @include('partials/_javascript')
        @yield('script')
    </body>
    
</html>
@section('content')

@endsection
