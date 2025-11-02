@extends('template.app')

@section('section1')

    <div class="container">

        <h2 class="text-center my-4">Latest Posts</h2>

        <div id="postsSplide" class="splide" aria-label="Posts carousel">
            <div class="splide__track">
                <ul class="splide__list">
                    @forelse($posts as $post)
                        <li class="splide__slide">
                            {{-- الرابط الآن هو جزء من البطاقة وليس العكس --}}
                            <article class="post-card" role="article" aria-labelledby="title-{{ $post->id }}">
                                <a href="{{ route('posts.show', $post) }}" class="text-decoration-none post-card-link">
                                    <div class="img-wrap">
                                        @if ($post->image)
                                            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}"
                                                loading="lazy">
                                        @else
                                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center"
                                                style="height:100%;">
                                                Default image
                                            </div>
                                        @endif
                                    </div>

                                    <div class="card-body">
                                        <h3 id="title-{{ $post->id }}" class="card-title">{{ $post->title }}</h3>
                                        <p class="card-text">
                                            {{ \Illuminate\Support\Str::limit(strip_tags($post->content), 100) }}</p>

                                        <div class="meta d-flex justify-content-between align-items-center">
                                            <small class="text-muted">{{ $post->updated_at->diffForHumans() }}</small>
                                            <div>
                                                @foreach ($post->categories as $cat)
                                                    <span class="badge bg-secondary ms-1">{{ $cat->name }}</span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </article>
                        </li>
                    @empty
                        <li class="splide__slide">
                            <div class="post-card p-4 text-center">No posts yet</div>
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <style>
        .splide__slide {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .post-card {
            width: 100%;
            max-width: 760px;
            margin: 0 auto;
            border-radius: .6rem;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 8px 26px rgba(0, 0, 0, 0.08);
            transition: transform .35s ease, box-shadow .35s ease, opacity .35s ease;
            transform: scale(0.92);
            opacity: 0.7;
        }

        .splide__slide.is-active .post-card {
            transform: scale(1);
            box-shadow: 0 12px 36px rgba(0, 0, 0, 0.12);
            opacity: 1;
        }

        .post-card-link {
            display: block;
            text-decoration: none;
            color: inherit;
        }

        .post-card .img-wrap {
            height: 220px;
            overflow: hidden;
            background: #e9ecef;
        }

        .post-card .img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .post-card .card-body {
            padding: 1rem 1.25rem;
            text-align: left;
        }

        .post-card .card-title {
            font-size: 1.1rem;
            margin-bottom: .4rem;
        }

        .post-card .card-text {
            color: #6c757d;
            margin-bottom: .6rem;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/css/splide.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4/dist/js/splide.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var splideElement = document.getElementById('postsSplide');

            if (splideElement && typeof Splide !== 'undefined') {
                new Splide('#postsSplide', {
                    type: 'loop',
                    perPage: 3,
                    focus: 'center',
                    gap: '1rem',
                    autoplay: true,
                    interval: 2500,
                    pauseOnHover: true,

                }).mount();
            } else {
                console.error('Splide element not found or Splide.js not loaded.');
            }
        });
    </script>
@endsection
