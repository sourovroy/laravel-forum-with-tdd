@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">
                    <a href="#">{{ $thread->creator->name }}</a>
                    posted: {{ $thread->title }}
                </div>

                <div class="card-body">
                    <p>{{ $thread->body }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">

            @foreach($thread->replies as $reply)
                @include('threads/reply')
            @endforeach

        </div>
    </div>

    
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if( auth()->check() )
                <form action="{{ $thread->path() . '/replies' }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <textarea name="body" rows="5" class="form-control" 
                            placeholder="Have something to say?"></textarea>
                    </div>

                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>
            @else
                <div class="alert alert-secondary" role="alert">
                    Please <a href="{{ route('login') }}">signed</a> in to perticipate in this discussion.
                </div>
            @endif
        </div>
    </div>
    
</div>
@endsection