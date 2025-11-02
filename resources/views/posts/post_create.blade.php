@extends('template.app')
@section('section1')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row g-4">

            <!-- Main: form -->
            <main class="col-md-9">
                <form enctype="multipart/form-data" method="POST" action="{{ url('/posts/store') }}">
                    @csrf

                    <div class="mb-3" style="max-width:720px;">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" name="title" class="form-control">
                        @error('title')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3" style="max-width:720px;">
                        <label for="content" class="form-label">Content</label>
                        <textarea id="content" name="content" class="form-control" rows="8"></textarea>
                        @error('content')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3" style="max-width:360px;">
                        <label class="form-label" for="image">Upload</label>
                        <input id="image" name="image" type="file" class="form-control">
                        @error('image')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
            </main>
            <!-- Sidebar: categories -->
            <aside class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        Categories
                    </div>
                    <div class="card-body">
                        @foreach ($categories as $cat)
                            <div class="form-check">
                                <input class="form-check-input" name="categories[]" type="checkbox"
                                    value="{{ $cat->id }}" id="category_{{ $cat->id }}"
                                    {{ in_array($cat->id, old('categories', isset($post) ? $post->categories->pluck('id')->toArray() : [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="category_{{ $cat->id }}">
                                    {{ $cat->name }}
                                </label>
                            </div>
                        @endforeach
                        @error('category_id')
                            <div class="text-danger small mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </aside>
            <div class="mt-3">
                <input class="btn btn-primary" type="submit" value="Create">
            </div>
            </form>
        </div>
    </div>
@endsection
