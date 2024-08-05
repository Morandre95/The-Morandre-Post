<x-layout
title="Search Results"
>

<div class="container mt-3 ">
    <div class="row justify-content-center">
        <div class="col-12 col-md-4">
            @if (session('message'))
            <div class="alert alert-success mt-custom-message alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        </div>
    </div>
</div>

    <x-masthead/>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <h1 class="text-center mb-4">All Articles for "{{ $query }}"</h1>
        </div>
    </div>
</div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-12 d-flex flex-wrap">
                @foreach ($articles as $article)
                        <x-article-card :article="$article"/>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 d-flex justify-content-center">
                        <a href="{{route('homepage')}}" class="btn btn-info mt-2">Homepage</a>
                    </div>
                </div>
            </div>

</x-layout>