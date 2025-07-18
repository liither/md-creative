<!-- resources/views/posts/show.blade.php -->
<x-layout-main>
    <x-slot:title>{{ $post->title }}</x-slot:title>

    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <!-- Post Title -->
                <h1 class="mb-3">{{ $post->title }}</h1>

                <!-- Post Category -->
                <p><strong>Category:</strong> {{ $post->category->category_name ?? 'Uncategorized' }}</p>

                <!-- Action Buttons -->
                <a href="/dashboard/posts" class="btn btn-success">
                    <i data-feather="arrow-left"></i> Back to all my posts
                </a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning">
                    <i data-feather="edit"></i> Edit
                </a>

                <!-- Delete Form -->
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger" onclick="return confirm('Are you sure?')">
                        <i data-feather="x-circle"></i> Delete
                    </button>
                </form>

                <!-- Post Image -->
                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->category_name ?? 'Post Image' }}" class="img-fluid mt-3">
                    </div>
                @endif

                <!-- Post Content -->
                <article class="my-3 fs-5">
                    {!! $post->article_text !!}
                </article>
            </div>
        </div>
    </div>

    <!-- Ensure Feather icons are replaced correctly -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace(); // Replaces all data-feather attributes with the actual icons
    </script>
</x-layout-main>
