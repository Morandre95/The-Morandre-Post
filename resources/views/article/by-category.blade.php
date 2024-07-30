<x-layout
title="See articles by category"
>

@if (session('message'))
    <div class="alert alert-success mt-5">
        {{ session('message') }}
    </div>
@endif

    <x-masthead
    h1="The Morandre Post"
    p="lorem ipsum"
    />
<div class="container-fluid p-5 bg-secondary-subtle text-center">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>{{ $category->name }}</h1>
        </div>
    </div>
</div>

    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                
            <div class="col-12 col-md-8 d-flex flex-column">
                <div class="card" style="width: 18rem;">
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="Immage article {{ $article->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text">{{ $article->consoles->name }}</p>
                        <p class="small text-muted my-0">
                        @if ($article->category)
                        <p class="text-muted small">Category: <a href="{{route ('article.byCategory', $article->category)}}" class="text-capitalize text-muted">{{$article->category->name}}"</a></p>
                    @else 
                        <p class="text-muted small">Uncategorized</p>
                    @endif
                    <p class="text-muted my-0">
                        @foreach ($article->tags as $tag)
                        #{{ $tag->name }}            
                        @endforeach
                    </p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <p>Create at : {{ $article->created_at->format('d/m/Y') }} <br>  By : <a href="{{route ('article.byUser', $article->user)}}">{{ $article->user->name }}</a></p>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-1">
                <a href="{{route('homepage')}}"><p class="btn btn-info mt-2">Homepage</a></p>
            </div>
        </div>
    </div>
</x-layout>