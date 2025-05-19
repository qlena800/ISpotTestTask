<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Product
        </div>
        <div class="card-body">
            <form name="add-product-form" id="add-product-form">
                @csrf
                <div class="row">
                    <div class="col-sm form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="col-sm form-group">
                        <label>Article</label>
                        <input type="text" name="article" class="form-control"></textarea>
                    </div>
                </div>
                <button type="button" id="product-form-submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            Products
        </div>
    </div>
</div>
<div class="container mt-4">
    <table id="products-table" class="table table-sm">
        <thead>
        <tr>
            <th>Name</th>
            <th>Article</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->article }}</td>
                <td>
                    <button type="button" data-id="{{ $product->id }}" class="btn btn-danger product-delete">Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
