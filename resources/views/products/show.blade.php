@extends('layouts.app')
@section('main')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8 m-4">
                <div class="card p-4">
                    <p class="fs-4">Name: <b>{{ $product->name }}</b></p>
                    <p class="fs-4">Description: <b>{{ $product->description }}</b></p>
                    <img src="/products/{{ $product->image }}" alt="Product Image" width="100%" class="rounded">
                    <a href="/" class="btn btn-dark mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
