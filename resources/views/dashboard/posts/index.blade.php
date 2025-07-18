<!-- resources/views/posts/index.blade.php -->
<x-layout-main>
    <x-slot:title>My Posts</x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
    </div>

    {{-- ✅ Flash Success Message --}}
    @if(session()->has('success'))
        <div class="alert alert-success col-lg-8">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-8">

        {{-- 🔽 Filter by Category --}}
        <form method="GET" action="{{ route('dashboard.posts.index') }}" class="mb-3 d-flex gap-2">
            <select name="category" class="form-select" style="max-width: 250px;">
                <option value="">All Categories</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->slug }}" {{ request('category') == $category->slug ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-secondary">Filter</button>
        </form>

        {{-- 🔘 Button to Create Post --}}
        <a href="{{ route('dashboard.posts.create') }}" class="btn btn-primary mb-3">Create new post</a>

        {{-- 🏷️ Current Filter Info --}}
        @if(request('category'))
            @php
                $activeCategory = $categories->firstWhere('slug', request('category'));
            @endphp
            @if ($activeCategory)
                <p>Showing posts in category: <strong>{{ $activeCategory->category_name }}</strong></p>
            @else
                <p>Category not found.</p>
            @endif
        @endif

        {{-- 📭 No Posts Message --}}
        @if($posts->isEmpty())
            <p>No posts found{{ request('category') ? ' in the selected category.' : '.' }}</p>
        @else
            {{-- 📝 Posts Table --}}
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->category_name }}</td>
                            <td>
                                <a href="{{ route('dashboard.posts.show', $post->slug) }}" class="badge bg-info" title="View"><i data-feather="eye"></i></a>
                                <a href="{{ route('dashboard.posts.edit', $post->slug) }}" class="badge bg-warning" title="Edit"><i data-feather="edit"></i></a>
                                <form action="{{ route('dashboard.posts.destroy', $post->slug) }}" method="POST" class="d-inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')" title="Delete"><i data-feather="x-circle"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Ensure Feather icons are replaced correctly -->
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace(); // Replaces all data-feather attributes with the actual icons
    </script>
</x-layout-main>
