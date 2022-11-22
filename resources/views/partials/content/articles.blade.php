@foreach($articles as $article)
    @include('partials.content.article', ['article' => $article])
@endforeach
