<div id="comment_{{$comment['id']}}"
    class="d-flex justify-post-end articleCommentPartial"
>
@if ($isReply)
    <div class="child-comment">
@endif
    <div class="d-flex flex-row mx-0 my-3 p-0 w-100"> 
        <div class="flex-column h-100 commentHeader mx-3 mx-lg-5">
            <a
            @if (isset($comment['author']))
                href="/user/{{ $comment['author']['id'] }}"
            @endif
            >
                <img alt="Commenter Avatar" src="{{
                    (isset($comment['author']) && isset($comment['author']['avatar'])) ?
                    asset('storage/avatars/'.$comment['author']['avatar']) : $userImgPHolder 
                }}" onerror="this.src='{{ $userImgPHolder }}'" />
            </a>

            @if (isset($comment['author']))
                <a href="/user/{{ $comment['author']['id'] }}" class="text-white">
                    {{ $comment['isAuthor'] ? 'You' : $comment['author']['name'] }}
                </a>
            @else
                <i>Deleted Account</i>
            @endif
        </div>

        <div class="flex-column m-0 p-0 w-100 commentBodyContainer">
            <div class="commentTextContainer border border-light flex-column p-3 mb-3">{{$comment['body']}}</div>

            <i
            @if ($comment['isAuthor'])
                class="fa fa-thumbs-up"
            @else
                @if ($comment['liked'])
                    class="fa fa-thumbs-up purpleLink feedbackIcon"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Like"
                    onclick="removeFeedback(this, {{ $comment['id'] }}, true, true)"
                @else
                    class="fa fa-thumbs-up feedbackIcon"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Like"
                    onclick="giveFeedback(this, {{ $comment['id'] }}, true, true)"
                @endif
            @endif
                id="likes_{{$comment['id']}}"
            >
                <span>{{ $comment['likes'] }}</span>
            </i>

            <i
            @if ($comment['isAuthor'])
                class="fa fa-thumbs-down ps-3 pe-3"
            @else
                @if ($comment['disliked'])
                    class="fa fa-thumbs-down ps-3 pe-3 feedbackIcon purpleLink"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dislike"
                    onclick="removeFeedback(this, {{ $comment['id'] }}, false, true)"
                @else
                    class="fa fa-thumbs-down ps-3 pe-3 feedbackIcon"
                    data-bs-toggle="tooltip" data-bs-placement="bottom" title="Dislike"
                    onclick="giveFeedback(this, {{ $comment['id'] }}, false, true)"
                @endif
            @endif
                id="dislikes_{{$comment['id']}}"
            >
                <span>{{ $comment['dislikes'] }}</span>
            </i>

            @if (Auth::check() && !$isReply)
                <span onclick="openReplyBox({{ $comment['article_id'] }}, {{ $comment['id'] }})"
                    class="px-3 hover-pointer">Reply</span>
            @endif

            @if (isset($comment['author']) && Auth::id() === $comment['author']['id'])
                <span onclick="openEditBox({{$comment['id']}}, {{$isReply}})" class="px-3 hover-pointer">Edit</span>
            @endif

            <span class="px-3 publishedAt">{{ $comment['published_at'] }}</span>

            @if ($comment['is_edited'])
                <i class="mx-3 editFlag">Edited</i>
            @endif

            @if ((isset($comment['author']) && Auth::id() === $comment['author']['id'] && !$comment['hasFeedback'])
                || (Auth::check() && Auth::user()->is_admin))
                <button
                    id="delete_post_{{$comment['id']}}"
                    data-bs-toggle="tooltip" data-bs-placement="right" title="Remove Comment"
                    onclick="confirmAction('#delete_post_{{$comment['id']}}', () => deleteComment({{$comment['id']}}))"
                    class="btn btn-transparent mb-0 px-2 mx-1"
                >
                    <i class="fas fa-trash text-danger" style="font-size: 1.7em;"></i>
                </button>
            @endif
        </div>
    </div>

@if ($isReply)
    </div>
@endif

</div>
