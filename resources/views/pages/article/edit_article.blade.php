@extends('layouts.app')

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src={{ asset('js/user.js') }}></script>
    <script type="text/javascript" src=" {{ asset('js/select2topics.js') }}"> </script>
@endsection

@section('title', "- Edit Article")

{{-- ------------------------------------------------------ --}}
@section('post')

    <div class="article-container container-fluid">

        <div class="d-flex flex-row my-2 h-100">

            <div class="articleInfoContainer d-flex flex-column mb-0 p-3 pe-5 h-100">

                <form name="article-form" method="POST" action="{{ route('editArticle', ['id' => $article['post_id']]) }}" class="flex-row h-100" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="flex-row">
                        <label for="title">Article Title</label>
                        <h2 class="m-0"> 
                            <input type="text" autofocus required minlength="3" maxlength="100" class="h-100" id="title"
                                name="title" value="{{ old('title') ? old('title') : $article['title'] }}">
                        </h2>
                        @if ($errors->has('title'))
                            <div class="alert alert-danger mt-2 mb-0 p-0 w-50 text-center" role="alert">
                                <p class="mb-0">{{ $errors->first('title') }}</p>
                            </div>
                        @endif
                    </div>

                    <div class="flex-row mt-3 mb-5 pe-3"> 
                        <label for="topics">Article Topics</label>

                        <select required id="topics" name="topics[]" multiple>
                            @foreach($topics as $tag)
                                <option class="m-0"
                                @if ( old('topics') ?
                                in_array($tag['id'], old('topics'))
                                :
                                $articletopics->contains('name', $tag['name'])
                                )
                                    selected
                                @endif
                                value="{{$tag['id']}}">{{ $tag['name'] }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('topics'))
                            <div class="alert alert-danger mt-2 mb-0 p-0 w-50 text-center" role="alert">
                                <p class="mb-0">{{ $errors->first('topics') }}</p>
                            </div>
                        @endif
                    </div>

                    <div class="flex-row">
                        <label for="thumbnail">Article Thumbnail</label>

                        <div id="avatarPreviewContainer" class="d-flex flex-column align-items-center">
                            <img class="col-8 col-md-6 mb-3" src={{ isset($article['thumbnail']) 
                                ? asset('storage/thumbnails/' . $article['thumbnail'])
                                : $articleImgPHolder }}
                                alt="Article Thumbnail Preview"
                                id="avatarPreview" onerror="this.src='{{ $articleImgPHolder }}'" />
                            
                            <input type="file" id="imgInput" name="thumbnail" accept="image/*">

                            @if ($errors->has('thumbnail'))
                                <div class="alert alert-danger ms-3 w-50 text-center py-1" role="alert">
                                    <p class="">{{ $errors->first('thumbnail') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="flex-row h-100">
                        <label for="body">Article Body</label>
                        <textarea id="body" name="body" minlength="10" rows="15" class="h-100">{{
                            old('body') ? old('body') : $article['body']
                        }}</textarea>
                        @if ($errors->has('body'))
                            <div class="alert alert-danger mt-2 mb-0 p-0 w-50 text-center" role="alert">
                                <p class="mb-0">{{ $errors->first('body') }}</p>
                            </div>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary px-4">Edit Article</button>
                        <button type="button" class="btn btn-secondary px-4 ms-4" onclick="goBack()" >Go Back</button>
                    </div>
                </form>

            </div>

            <div class="d-none d-lg-block author-container flex-col p-3 text-dark">
                @include('partials.authorInfo', [
                    'author' => $author,
                    'isOwner' => true
                ])
            </div>

        </div>

    </div>

@endsection
