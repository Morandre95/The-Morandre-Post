<x-layout title="By User">

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

    <x-masthead />
    <div class="container-fluid text-center">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1>{{__('ui.Created By')}} "{{ $user->name }}"</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 mb-5 d-flex flex-column align-items-center">

                    <div class="card" style="width: 18rem;">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top"
                            alt="Immage article {{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->consoles->name }}</p>
                            <p class="small text-muted my-0">
                                @if ($article->category)
                                    <p class="text-muted small">{{__('ui.Category')}}: <a
                                            href="{{ route('article.byCategory', $article->category) }}"
                                            class="text-capitalize text-muted">{{ $article->category->name }}"</a></p>
                                @else
                                    <p class="text-muted small">{{__('ui.Uncategorized')}}</p>
                                @endif
                            <p class="text-muted my-0">
                                @foreach ($article->tags as $tag)
                                    #{{ $tag->name }}
                                @endforeach
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p>Create at : {{ $article->created_at->format('d/m/Y') }}</p>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-primary">{{__('ui.Read')}}</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <a href="{{ route('homepage') }}" class="btn btn-info mt-2">{{__('ui.Homepage')}}</a>
            </div>
        </div>
    </div>

</x-layout>
