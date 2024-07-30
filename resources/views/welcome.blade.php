<x-layout
title="Homepage"
>
<x-masthead
h1="The Morandre Post"
p="lorem ipsum"
/>

@if (session('alert'))
    <div class="alert alert-success mt-5">
        {{ session('alert') }}
    </div>
@endif

@if (session('message'))
    <div class="alert alert-success mt-5">
        {{ session('message') }}
    </div>
@endif

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
        <h1 class="text-center mb-5">Latest Articles</h1>
        </div>
    </div>
</div>
    <div class="container-fluid">
        <div class="row">
                @foreach ($articles as $article)
                    <div class="col-12 col-md-3 mt-5 d-flex justify-content-evenly">
                        <x-article-card :article="$article"/>
                    </div>
                @endforeach
            </div>
        </div>

</x-layout>