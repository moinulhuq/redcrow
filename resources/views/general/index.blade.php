@extends('layouts.app')

@section('title', 'Blog Post List')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    @if(count($Posts))
        <div class="container">
            @foreach($Posts as $Post)
                <div class="row">
                    <div class="col-sm">
                        <a href="/post/{{$Post->id}}"><h3>{{ $Post->title }}</h3></a>
                        <hr>
                        <p>{{ $Post->body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
@section('footer')
    @include('layouts.footer')
@endsection