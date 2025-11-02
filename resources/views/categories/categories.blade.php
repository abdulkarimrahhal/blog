@extends('template.app')
@section('section1')
    <h2
        style="  position: fixed; /* أو absolute */
  top: 17%;         /* 20% من أعلى الشاشة */
  left: 50%;        /* 50% من يسار الشاشة */
  transform: translateX(-50%);">
        CATEGORIES</h2>
    {{-- <br> --}}
    <p><a class="btn btn-outline-primary" href="/categories/create" role="button">Create Category</a></p>
    @foreach ($categories as $category)
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <small class="text-muted">{{ $category->updated_at->diffForHumans() }}</small>
                        <div class="card-body">
                            <a href="/categories/{{ $category->id }}/edit" class="btn btn-outline-info">Edit</a>
                            <form action="/categories/{{ $category->id }}/delete" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{ $categories->links('pagination::bootstrap-5') }}
@endsection
