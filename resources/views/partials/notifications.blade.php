@if ($notifications->isEmpty())
    <div class="text-center">No notifications</div>
@endif

@foreach ($notifications as $notification)
    <div class="toast show notificationPanelItem mb-3">
        <div class="toast-header">
            <small class="text-muted">{{ $notification['time'] }}</small>
        </div>
        <div class="toast-body">
            <a href="{{ route('userProfile', ['id' => $notification['user_id']]) }}">
                {{ $notification['username'] }}
            </a> 

            @if ($notification['type'] === "COMMENT")
                commented in your article 
            @elseif ($notification['type'] === "REPLY")
                replied to your comment in 
            @elseif ($notification['type'] === "ARTICLE_LIKE")
                liked your article 
            @elseif ($notification['type'] === "COMMENT_LIKE")
                liked your comment in 
            @endif

            <a href="{{ route('article', ['id' => $notification['article_id']]) }}">
                {{ $notification['article_title'] }}
            </a>

            @if ($notification['type'] !== "ARTICLE_LIKE")
                <br>
                <i class="text-light">{{ $notification['comment_body'] }}</i>
            @endif
        </div>
    </div>
@endforeach
