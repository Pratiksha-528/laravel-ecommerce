<!-- resources/views/admin/dashboard.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <p>Total Products: {{ $totalProducts }}</p>
    <p>Total Cart Items: {{ $totalCartItems }}</p>

    <a href="{{ route('products.index') }}">Manage Products</a><br>
    <a href="{{ route('admin.carts.index') }}">View Carts</a><br>

    <form method="POST" action="{{ route('admin.logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
