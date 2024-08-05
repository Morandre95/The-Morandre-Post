<x-layout title="{{__('ui.Homepage')}}">
    <x-masthead   />

    @if (session('alert'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="alert alert-success">
                    {{ session('alert') }}
                </div>
            </div>
        </div>
    </div>
    @endif
    @if (session('message'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if (!empty($articles && $articles->count() > 0))
        <div class="container-fluid mt-5">
            <div class="row">
                <div class="col-12 mt-5 mt-md-0">
                    <h1 class="text-center mb-5">{{__('ui.Latest Articles')}}</h1>
                </div>
                @else
                <h1 class="text-center mt-5 p-5">{{__('ui.No articles yet')}} @if(Auth::check() && Auth::user()->is_writer), <a href="{{ route('article.create') }}"> <button class="btn btn-custom p-1 mx-1 mt-3 mt-md-0 fs-3"> create it now</button></a>@endif</h1>
            </div>
        </div>
    @endif
    <div class="container-fluid">
        <div class="row">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 mt-3 d-flex justify-content-evenly">
                    <x-article-card :article="$article" />
                </div>
            @endforeach
        </div>
    </div>

</x-layout>
