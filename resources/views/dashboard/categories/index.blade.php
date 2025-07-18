<!-- resources/views/posts/categories.blade.php -->
<x-layout-main>
    <x-slot:title>Post Categories</x-slot:title>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Post Categories</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-6" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive col-lg-6">
        <a href="/dashboard/categories/create" class="btn btn-primary mb-3">Create new category</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Category Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($categories as $category)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $category->category_name }}</td>
              <td>
                <a href="/dashboard/categories/{{ $category->slug }}" class="badge bg-info">
                  <i data-feather="eye"></i>
                </a>
                <a href="/dashboard/categories/{{ $category->slug }}/edit" class="badge bg-warning">
                  <i data-feather="edit"></i>
                </a>
                <form action="/dashboard/categories/{{ $category->slug }}" method="post" class="d-inline">
                  @method('delete')
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

</x-layout-main>

<!-- Ensure Feather icons are replaced correctly -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace(); // Replaces all data-feather attributes with the actual icons
</script>
