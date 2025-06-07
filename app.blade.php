<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') - Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    @include('admin.layouts.navbar') {{-- Optional navbar --}}
    <div class="container mt-4">
        @yield('content')
    </div>
</body>
</html>
