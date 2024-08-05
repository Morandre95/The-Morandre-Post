<x-layout title="Edit Article">

    <x-masthead  />

    <div class="container-fluid mt-5 text-center">
        <div class="row justify-content-center">
            <div class="col-12 mt-5 mt-md-0">
                <h1>Edit Article</h1>
            </div>
        </div>
    </div>

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
    <div class="container-fluid my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form action="{{ route('article.update', $article) }}" method="POST" class="card p-5 shadow"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $article->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="platform" class="form-label">Console</label>
                        <div class="dropdown-wrapper">
                            <select class="form-control custom-select" id="platform" name="platform">
                                <option selected disable>Select Console</option>
                                @foreach ($consoles as $console)
                                    <option value="{{ $console->id }}"
                                        {{ $article->platform_id == $console->id ? 'selected' : '' }}>
                                        {{ $console->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('platform')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="d-flex justify-content-center">Current Image</label>
                        <div class="d-flex justify-content-center">
                            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->title }}" class="w-5 d-flex">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">New image</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <div class="dropdown-wrapper">
                            <select class="form-control custom-select" id="category" name="category">
                                <option disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $article->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('category')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags</label>
                        <input type="text" class="form-control" id="tags" name="tags"
                            value="{{ $article->tags->implode('name', ',') }}">
                        <span class="small text-muted fst-italic"> Separate tags with commas</span>
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="body" class="form-label">Text</label>
                        <textarea class="form-control" id="body" name="body" cols="30" rows="7">{{ $article->body }}"</textarea>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="rating">Rating:</label>
                        <select name="rating" id="rating">
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('body')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mt-3 d-flex justify-content-center ">
                        <button type="submit" class="btn btn-primary">Edit Article</button>
                    </div>
                </form>
                <form action="{{ route('article.destroy', $article) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <div class="container mt-4">
                        <div class="row justify-content-center">
                            <div class="col-12 col-md-6 d-flex justify-content-center">
                                <button type="submit" class="btn btn-danger">Delete Article</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
