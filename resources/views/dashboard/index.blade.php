<!-- resources/views/dashboard/welcome.blade.php -->
<x-layout-main>
    <x-slot:title>Welcome Back</x-slot:title>

    <div class="d-flex align-items-center border-bottom mb-3" style="padding-top: 0.5rem;">
        <h1 class="h4 mb-0">Welcome back, {{ auth()->user()->name }}</h1>
    </div>
</x-layout-main>
