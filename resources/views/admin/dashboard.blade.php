<x-layout title="Admin Dashboard">

    <x-masthead 
    h1="The Morandre Post"
    p="Welcome back, Admin {{ Auth::user()->name }}"/>

    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2>Requests for administrator role</h2>
                <x-request-table :roleRequest="$adminRequests" role="admin" />
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2>Requests for revisor role</h2>
                <x-request-table :roleRequest="$revisorRequests" role="revisor" />
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2>Requests for writer role</h2>
                <x-request-table :roleRequest="$writerRequests" role="writer" />
            </div>
        </div>
    </div>
    <hr>

    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2>All tags</h2>
                <x-metainfo-table :metaInfos="$tags" metaType="tag"/>
            </div>
        </div>
    </div>
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <h2>All categories</h2>
                <form action="{{route('admin.storeCategory')}}" method="post" class="w-50 d-flex m-3">
                    @csrf
                    <input type="text" name="name" class="form-control me-2" placeholder="New category name">
                    <button type="submit" class="btn btn-secondary">Add</button>
                </form>
                <x-metainfo-table :metaInfos="$categories" metaType="category"/>
            </div>
        </div>
    </div>


</x-layout>