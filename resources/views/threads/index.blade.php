@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Threads</div>

                <div class="card-body">
                    @foreach($threads as $thread)
                        <h4>
                            <a href="{{ $thread->path() }}">{{ $thread->title }}</a>
                        </h4>
                        <div class="body">
                            <p>{{ $thread->body }}</p>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection