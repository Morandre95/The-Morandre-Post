<x-layout title="Revisor Dashboard">

        <x-masthead 
        h1="The Morandre Post"
        p="Welcome back, Revisor {{ Auth::user()->name }}"/>

        @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="text-center">Articles to review</h2>
                <x-articles-table :articles="$unrevisionedArticles"/>
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="text-center">Articles accepted</h2>
                <x-articles-table :articles="$acceptedArticles"/>
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="text-center">Articles rejected</h2>
                <x-articles-table :articles="$rejectArticles"/>
            </div>
        </div>
    </div>

</x-layout>