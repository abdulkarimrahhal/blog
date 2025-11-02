@extends('template.app')
@section('section1')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form enctype="multipart/form-data" method="POST" action="{{ route('posts.update', $post->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">title</label>
            <input name="title" class="form-control" id="exampleFormControlInput1" placeholder="{{ $post->title }}" value="{{old('title',$post->title)}}">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">content</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"> {{old('content',$post->content)}} </textarea>
        </div>
        <br>
        <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupFile01">Upload</label>
            <input name="image" type="file" class="form-control" id="inputGroupFile01">
        </div>
        <aside class="col-md-3">
            <div class="card">
                <div class="card-header">
                    Categories
                </div>
                <div class="card-body">
                    @foreach ($categories as $cat)
                        <div class="form-check">
                            <input class="form-check-input" name="categories[]" type="checkbox" value="{{ $cat->id }}"
                                id="category_{{ $cat->id }}"
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
        <br>
        <input class="btn btn-primary" type="submit" value="OK">
    </form>
@endsection
