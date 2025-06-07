<!DOCTYPE html>
<html>
<head>
    <title>All Products</title>
</head>
<body>
    <h1>Products List</h1>
    <a href="{{ route('products.create') }}">Add New Product</a>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>

                            @foreach($products as $product)
    <div>
        <h3>{{ $product->name }}</h3>
        <p>Price: {{ $product->price }}</p>

        <form action="{{ route('cart.add') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <label>Quantity:</label>
            <input type="number" name="quantity" value="1" min="1" required>
            <button type="submit">Add to Cart</button>
        </form>
    </div>
@endforeach

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

