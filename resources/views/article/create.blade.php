<x-layout title="Create Article">

    <x-masthead  />

    @foreach ($errors->all() as $error)
    <div class="container ">
        <div class="row justify-content-center">
            <div class="col-12 col-md-3 bg-danger rounded m-3">
                <li>{{ $error }}</li>
            </div>
        </div>
    </div>
    @endforeach
    
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center mb-5">{{__('ui.Create Article')}}</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <form action="{{ route('article.store') }}" method="POST" class="card p-5 shadow"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">{{__('ui.Title')}}</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ old('title') }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="platform" class="form-label">Console</label>
                        <select class="form-control" id="platform" name="platform">
                            <option selected disable>{{__('ui.Select Console')}}</option>
                            @foreach ($consoles as $console)
                                <option value="{{ $console->id }}">{{ $console->name }}</option>
                            @endforeach
                        </select>
                        @error('platform')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">{{__('ui.Image')}}</label>
                        <input type="file" class="form-control" id="image" name="image"
                            value="{{ old('image') }}">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">{{__('ui.Category')}}</label>
                        <select class="form-control" id="category" name="category">
                            <option selected disable>{{__('ui.Select Category')}}</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">{{__('ui.Tags')}}</label>
                        <input type="text" class="form-control" id="tags" name="tags"
                            value="{{ old('tags') }}">
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">{{__('ui.Description')}}</label>
                        <textarea class="form-control" id="body" name="body" cols="30" rows="7">{{ old('body') }}</textarea>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rating">{{__('ui.Rating')}}:</label>
                        <select name="rating" id="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mt-3 d-flex justify-content-center flex-column align-items-center">
                        <button type="submit" class="btn btn-primary">{{__('ui.Create Article')}}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
