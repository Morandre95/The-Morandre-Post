<x-layout title="Admin Dashboard">

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

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-5">
                <h2 class="text-center mb-5">{{__('ui.Requests for administrator role')}}</h2>
                <x-request-table :roleRequest="$adminRequests" role="admin" />
                @if (empty($adminRequests->count() > 0))
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            <h3 class=" mb-5">{{__('ui.No request for administrator role')}}</h3>
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
            <div class="col-12 col-md-5">
                <h2 class="text-center mb-5">{{__('ui.Requests for revisor role')}}</h2>
                <x-request-table :roleRequest="$revisorRequests" role="revisor" />
                @if (empty($revisorRequests->count() > 0))
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            <h3 class=" mb-5">{{__('ui.No request for revisor role')}}</h3>
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
            <div class="col-12 col-md-5 mb-5">
                <h2 class="text-center mb-5">{{__('ui.Requests for writer role')}}</h2>
                <x-request-table :roleRequest="$writerRequests" role="writer" />
                @if (empty($writerRequests->count() > 0))
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-12">
                            <h3 class=" mb-5">{{__('ui.No request for writer role')}}</h3>
                            <hr>
                        </div>
                    </div>
                </div>
            @endif
            </div>
        </div>
    </div>
    <hr>
{{-- TAGS AND CATEGORIES --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7">
                <h2 class="mb-5">{{__('ui.All Tags')}}</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tag"/>
            </div>
        </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7">
                <h2 class="mb-4">{{__('ui.All Categories')}}</h2>
                <form action="{{route('admin.storeCategory')}}" method="post" class="input-md-w d-flex mb-5">
                    @csrf
                    <input type="text" name="name" class="form-control me-2" placeholder="{{__('ui.New category name')}}">
                    <button type="submit" class="btn btn-secondary">{{__('ui.Add')}}</button>
                </form>
                <x-metainfo-table :metaInfos="$categories" metaType="category"/>
            </div>
        </div>
    </div>


</x-layout>