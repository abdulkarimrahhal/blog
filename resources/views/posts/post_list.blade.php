@extends('template.app')
<style>
    .card .card-text {
        max-height: 58px;
        overflow: hidden;
    }

    .card:hover .card-text {
        max-height: 1000px
    }
</style>
@section('section1')
    <h2
        style="  position: fixed; /* أو absolute */
  top: 17%;         /* 20% من أعلى الشاشة */
  left: 50%;        /* 50% من يسار الشاشة */
  transform: translateX(-50%);">
        POSTS</h2>
    {{-- <br> --}}
    <p><a class="btn btn-outline-primary" href="posts/create" role="button">Create Post</a></p>
    <div style="position : absolute; top : 24% ; left :50% ; transform: translateX(-50%);">
        @foreach ($posts as $post)
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="card-img-top" src="{{ asset('storage/' . $post->image) }}" alt="Card image cap"
                            width="225px" height="200px">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #2882d1;margin-bottom: .6rem;">
                                {{ $post->title }}</h5>
                            <p><strong>Categories:</strong>
                                @foreach ($post->categories as $cat)
                                    <span class="badge bg-secondary">{{ $cat->name }}</span>
                                @endforeach
                            </p>
                            <p class="card-text">{{ $post->content }}</p>
                            <p class="card-text"><small class="text-muted">Last updated
                                    {{ $post->updated_at->diffForHumans() }}</small></p>
                            <p><a class="btn btn-outline-info" href="posts/{{ $post->id }}">show details</a></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- {{ $posts->links('pagination::bootstrap-5') }} --}}
@endsection
