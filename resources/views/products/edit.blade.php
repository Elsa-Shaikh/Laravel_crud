<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Laravel Crud</title>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Laravel-Crud</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Products</a></li>
            </ul>
        </div>
    </nav>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block"> <strong>{{ $message }}</strong></div>
    @endif

    <div class="container">
        <h1 style="text-align: center">Edit Products #{{ $product->name }}</h1>
        <div class="row">
            <div class="col-sm-12" style="margin-top: 1.5rem">
                <div class="card mt-5 p-3" style="padding: 2.5rem; box-shadow:  4px 4px 6px 6px #888888;">
                    <div class="card-body">
                        <form action="/product/{{ $product->id }}/update" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $product->name) }}" placeholder="Enter Your Product Name">
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <textarea name="description" rows="4" class="form-control" placeholder="Enter Your Product Name">{{ old('description', $product->description) }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
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
</body>

</html>
