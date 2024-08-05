<x-layout title="Show Article">

    @if (session('message'))
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="alert alert-success mt-custom-message alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    @endif
    
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>{{ $article->title }}</h1>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 d-flex flex-column align-items-center mt-5">
                <div class="card d-flex justify-content-center" style="width: 18rem;">
                    <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="Image article {{ $article->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->consoles->name }}</p>
                        <p class="small text-muted my-0">
                        @if ($article->category)
                            <p class="fs-5">Category: <a href="{{ route('article.byCategory', $article->category) }}" class="text-capitalize text-muted">{{ $article->category->name }}</a></p>
                        @else 
                            <p class="fs-5">Uncategorized</p>
                        @endif
                        <p class="text-muted my-0">
                            @foreach ($article->tags as $tag)
                            #{{ $tag->name }}
                            @endforeach
                        </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p>Create at: {{ $article->created_at->format('d/m/Y') }} <br> By: <a class="card-by-show" href="{{ route('article.byUser', $article->user) }}">{{ $article->user->name }}</a></p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 mt-5 d-flex justify-content-center">
                <p>{{$article->body}}</p>
            </div>
            @if (Auth::user() && Auth::user()->is_revisor)
            <div class="container-fluid my-5">
                <div class="row justify-content-end">
                        <div class="col-12 col-md-6 d-flex justify-content-evenly">
                            <form action="{{ route('revisor.acceptArticle', $article) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Accept</button>
                            </form>
                                <a href="{{ route('article.index') }}" class="btn btn-info m-0">Return All Articles</a>
                            <form action="{{ route('revisor.rejectArticle', $article) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
        </div>
    </div>
    
    </x-layout>
    