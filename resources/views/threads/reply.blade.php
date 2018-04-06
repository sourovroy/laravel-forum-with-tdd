<div class="card mb-3">
    <div class="card-header">
        {{ $reply->owner->name }} said 
        {{ $reply->created_at->diffForHumans() }}
    </div>
    <div class="card-body">
        <p>{{ $reply->body }}</p>
    </div>
</div>