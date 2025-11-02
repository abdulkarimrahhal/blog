@extends('template.app')
@section('section1')
    <div class="card mb-3">
        <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="..."
            style="margin-left: 50px; width: 1200px; height: 400px">
        <div class="card-body">
            <h4 class="card-title">{{ $post->title }}</h4>
            <p><strong>Categories:</strong>
                @foreach ($post->categories as $cat)
                    <span class="badge bg-secondary">{{ $cat->name }}</span>
                @endforeach
            </p>
            <p class="card-text">{{ $post->content }}</p>
            <p class="card-text"><small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small></p>
            <p class="card-text"><small class="text-muted">auther : {{ $name = Auth::user()->name }}</small></p>
        </div>
        <div class="card-body">
            <a href="/posts/{{ $post->id }}/edit" class="btn btn-outline-info">Edit</a>
            <form action="/posts/{{ $post->id }}/delete" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger"
                    onclick="return confirm('هل أنت متأكد أنك تريد حذف المنشور؟');">Delete</button>
            </form>
        </div>
    </div>
@endsection
