@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <h1 class="mb-3">{{ $post->title }}</h1>

            <a href="{{ route('dashboard.posts.index') }}" class="btn btn-success">
                <i data-feather="arrow-left"></i> Back to all my posts
            </a>
            <a href="{{ route('dashboard.posts.edit', $post->slug) }}" class="btn btn-warning">
                <i data-feather="edit"></i> Edit
            </a>
            <form action="{{ route('dashboard.posts.destroy', $post->slug) }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                    <i data-feather="x-circle"></i> Delete
                </button>
            </form>

            @if ($post->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
                </div>
            @endif

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
        </div>
    </div>
</div>
@endsection