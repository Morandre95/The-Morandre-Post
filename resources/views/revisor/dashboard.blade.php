<x-layout title="Revisor Dashboard">

        <div class="container">
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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="text-center mb-4">{{__('ui.Articles to review')}}</h2>
                <x-articles-table :articles="$unrevisionedArticles"/>
                @if (empty($articles && $unrevisionedArticles->count() > 0))
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            <h3 class=" mb-5">{{__('ui.No articles to review')}}</h3>
                            <hr>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="text-center mb-4">{{__('ui.Articles accepted')}}</h2>
                <x-articles-table :articles="$acceptedArticles"/>
                @if (empty($articles && $acceptedArticles->count() > 0))
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            <h3 class=" mb-5">{{__('ui.No articles accepted')}}</h3>
                            <hr>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2 class="text-center mb-4">{{__('ui.Articles rejected')}}</h2>
                <x-articles-table :articles="$rejectArticles"/>
                @if (empty($articles && $rejectArticles->count() > 0))
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            <h3 class=" mb-5">{{__('ui.No articles rejected')}}</h3>
                            <hr>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>

</x-layout>