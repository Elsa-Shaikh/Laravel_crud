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
    <div class="container">
        <h1>Products</h1>
        <div>
            <a href="/product/create" class="btn btn-danger navbar-btn">Add Products</a>
        </div>
        <div class="container mt-3" style="margin-top: 2rem">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">Product_Name</th>
                        <th style="text-align: center">Product_Description</th>
                        <th style="text-align: center">Product_Image</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <img src="products/{{ $item->image }}" style="border-radius: 50%" width="50"
                                    height="50" alt="Product Image">
                            </td>
                            <td>
                                <a href="product/{{ $item->id }}/edit" class="btn btn-info">Edit</a>
                                {{-- <a href="product/{{$item->id}}/delete" class="btn btn-danger">Delete</a> --}}
                                <form method="POST" action="product/{{ $item->id }}/delete"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

    </div>

</body>

</html>
