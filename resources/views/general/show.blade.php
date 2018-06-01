@extends('layouts.app')

@section('title', 'Blog Post Details')

@section('navbar')
    @include('layouts.navbar')
@endsection

@section('content')
    @if(count($Post))
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h3>{{ $Post->title }}</h3>
                    <hr>
                    <p>{{ $Post->body }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <hr>
                    @foreach($Post->comments as $comment)
                        <p>{{ $comment->body }}</p>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <hr>
                    <form action="/comment/{{$Post->id}}" method="post" class="container was-validated" novalidate>
                        @csrf
                        <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                            <label for="body">Comment</label>
                            <textarea class="form-control" id="body" name="body" rows="3" aria-describedby="bodyHelp"  {{ $errors->has('body') ? ' autofocus' : '' }} required>{{ old('body') }}</textarea>
                            <small id="bodyHelp" class="form-text text-muted">Body of the Comment.</small>
                            <div class="invalid-feedback">{{$errors->first('body')}}</div>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('footer')
    @include('layouts.footer')
@endsection