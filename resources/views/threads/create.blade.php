@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Thread</div>

                <div class="card-body">
                    <form action="/threads" method="post">
                        {{ csrf_field() }}
                        
                        @if(count($errors))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                        
                        <div class="form-group">
                            <label>Choose a channel</label>
                            <select name="channel_id" class="form-control">
                                <option value="">Choolse one</option>
                                @foreach(App\Models\Channel::all() as $channel)
                                    <option value="{{ $channel->id }}" {{ old('channel_id') == $channel->id ? 'selected' : '' }}>
                                        {{ $channel->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Body</label>
                            <textarea class="form-control" name="body" rows="5">{{ old('body') }}</textarea>
                        </div>

                        <button class="btn btn-primary" type="submit">Publish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection