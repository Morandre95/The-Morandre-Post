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
        <p class="card-subtitle txt-muted fst-italic small">Reading time {{ $article->readDuration() }} min</p>
        <p>Rating : {{ $article->rating }}</p>
    </div>
    <div class="card-footer d-flex justify-content-between align-items-center">
        <p>Create at : {{ $article->created_at->format('d/m/Y') }} <br> By : <a href="{{route ('article.byUser', $article->user)}}">{{ $article->user->name }}</a></p>
        <a href="{{ route('article.show', $article) }}" class="btn btn-primary">Read</a>
    </div>
</div>