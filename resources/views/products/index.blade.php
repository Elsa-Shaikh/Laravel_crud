@extends('layouts.app')
@section('main')
    <div class="container mt-3">
        <h1>Products</h1>
        <div class="d-flex justify-content-end">
            <a href="/product/create" class="btn btn-warning navbar-btn">Add Products</a>
        </div>
        <div class="container mt-3">
            <table class="table table-hover">
                <thead class="text-center">
                    <tr>
                        <th>ID</th>
                        <th>Product_Name</th>
                        <th>Product_Description</th>
                        <th>Product_Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>
                                <a href="product/{{ $item->id }}/show" class="text-dark">{{ $item->name }}</a>
                            </td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="products/{{ $item->image }}" class="rounded-circle" width="40" height="40"
                                    alt="Product Image">
                            </td>
                            <td>
                                <a href="product/{{ $item->id }}/edit" class="btn btn-info">Edit</a>
                                {{-- <a href="product/{{$item->id}}/delete" class="btn btn-danger">Delete</a> --}}
                                <form method="POST" action="product/{{ $item->id }}/delete" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
