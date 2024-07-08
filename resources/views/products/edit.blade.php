@extends('layouts.app')
@section('main')
    <div class="container mt-5">
        <h1 class="text-center">Edit Products #{{ $product->name }}</h1>
        <div class="row justify-content-center">
            <div class="col-sm-8 mt-1">
                <div class="card mt-5 p-3">
                    <div class="card-body">
                        <form action="/product/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-2">
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $product->name) }}" placeholder="Enter Your Product Name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <textarea name="description" rows="4" class="form-control" placeholder="Enter Your Product Name">{{ old('description', $product->description) }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-2">
                                <input type="file" class="form-control" name='image'>
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                            <button type="submit" class="btn btn-info">Edit</button>
                            <a href="/" class="btn btn-dark">Cancel</a>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
