<x-layout title="All articles">

    @if (session('message'))
        <div class="alert alert-success mt-5">
            {{ session('message') }}
        </div>
    @endif

    <x-masthead h1="The Morandre Post" p="lorem ipsum" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-5">
                <h1 class="text-center">All Articles</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-article-card :article="$article" />
                </div>
            @endforeach
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-1">
                <a href="{{ route('homepage') }}"><p class="btn btn-info mt-2">Homepage</a></p>
            </div>
        </div>
    </div>

</x-layout>
