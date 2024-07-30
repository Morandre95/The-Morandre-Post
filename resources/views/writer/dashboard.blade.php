<x-layout title="Writer Dashboard">

    <x-masthead 
    h1="The Morandre Post"
    p="Welcome back, Writer {{ Auth::user()->name }}"/>


    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h2 class="text-center">Articles to review</h2>
                <x-writer-articles-table :articles="$unrevisionedArticle"
                :consoles="$consoles"/>
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h2 class="text-center">Articles accepted</h2>
                <x-writer-articles-table :articles="$acceptedArticles"
                :consoles="$consoles"/>
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <h2 class="text-center">Articles rejected</h2>
                <x-writer-articles-table :articles="$rejectArticles"
                :consoles="$consoles"/>
            </div>
        </div>
    </div>

</x-layout>