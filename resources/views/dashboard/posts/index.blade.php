@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
    <a href="{{ route('dashboard.posts.create') }}" class="btn btn-primary mb-3">Create new post</a>
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                {{-- <td>{{ $post->category->name }}</td> --}}
                <td>
                    <a href="{{ route('dashboard.posts.show', $post->slug) }}" class="badge bg-info">
                        <i data-feather="eye"></i>
                    </a>
                    <a href="{{ route('dashboard.posts.edit', $post->slug) }}" class="badge bg-warning">
                        <i data-feather="edit"></i>
                    </a>
                    <form action="{{ route('dashboard.posts.destroy', $post->slug) }}" method="POST" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                            <i data-feather="x-circle"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection