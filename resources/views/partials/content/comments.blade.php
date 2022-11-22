@foreach ($comments as $comment)
    @include('partials.content.comment', ['comment' => $comment, 'isReply' => false])

    @foreach ($comment['children'] as $child)
        @include('partials.content.comment', ['comment' => $child, 'isReply' => true])
    @endforeach

@endforeach
