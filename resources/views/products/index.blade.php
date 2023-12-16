@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h3>All Products</h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productCreateModal">Create</button>
                </div>

                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $key => $product)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $product->name }}</td>
                                <td>৳{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td class="d-flex">
                                    <a href="#" class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#productSellModal{{ $product->id }}">Sell</a>
                                    <a href="#" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#productEditModal{{ $product->id }}">Edit</a>
                                    <form action="{{ route('product.delete', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <!-- Edit Modal -->
                            <div class="modal fade" id="productEditModal{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Product</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ route('product.update', $product->id) }}">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="col-form-label">Name:</label>
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Product Name" value="{{ $product->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="price" class="col-form-label">Price:</label>
                                                    <input type="text" class="form-control" id="price" name="price" placeholder="Product Price" value="{{ $product->price }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="quantity" class="col-form-label">Quantity:</label>
                                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Product Quantity" value="{{ $product->quantity }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="description" class="col-form-label">Description:</label>
                                                    <textarea class="form-control" id="description" name="description" placeholder="Product Description">{{ $product->description }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Sell Modal -->
                            <div class="modal fade" id="productSellModal{{ $product->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Order Create</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form method="POST" action="{{ route('product.sell', $product->id) }}">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="name" class="col-form-label">Name:</label>
                                                    <input disabled type="text" class="form-control" id="name" value="{{ $product->name }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="price" class="col-form-label">Price:</label>
                                                    <input disabled type="text" class="form-control" id="price" value="{{ $product->price }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="quantity" class="col-form-label">Quantity:</label>
                                                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Product Quantity" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Order</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="productCreateModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{ route('product.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="col-form-label">Price:</label>
                        <input type="text" class="form-control" id="price" name="price" placeholder="Product Price">
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="col-form-label">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Product Quantity">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="col-form-label">Description:</label>
                        <textarea class="form-control" id="description" name="description" placeholder="Product Description"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
