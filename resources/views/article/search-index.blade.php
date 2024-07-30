<x-layout
title="Search Results"
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
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6">
            <h1>All Articles for {{ $query }}</h1>
        </div>
    </div>
</div>

    <div class="container-fluid">
        <div class="row justify-content-evenly">
                @foreach ($articles as $article)
                    <div class="col-12 col-md-3">
                        <x-article-card :article="$article"/>
                    </div>
                    <div>
                    </div>
                    
                    @endforeach
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-1">
                        <p class="btn btn-info mt-2">Homepage<a href="{{route('homepage')}}"></a></p>
                    </div>
                </div>
            </div>

</x-layout>