@extends('dashboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>
            <p><strong>Category:</strong> {{ $post->category->category_name ?? 'Uncategorized' }}</p>

            <a href="/dashboard/posts" class="btn btn-success"><i data-feather="arrow-left"></i> Back to all my posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i data-feather="edit"></i> Edit</a>
            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="badge bg-danger" onclick="return confirm('Are you sure?')"><i data-feather="x-circle"></i> Delete</button>
            </form> 

            @if ($post->image)
            <div style="max-height: 350px; overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->category_name ?? 'Post Image' }}" class="img-fluid mt-3">
            </div>
            @endif

            <article class="my-3 fs-5">
                {!! $post->article_text !!}
            </article>
        </div>
    </div>
</div>  
@endsection
