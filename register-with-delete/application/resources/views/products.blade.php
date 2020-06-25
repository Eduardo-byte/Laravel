@extends('layout.app' , ["current" => "products"]) {{-- current is the variable that we want to pass to app.blade.php and products is the value of the variable / then we will verify this on the navbar.blade.php --}}

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Product register</h5>
            @if(count($newListProducts) > 0)
                <table class="table table-ordered table-hover">
                    <thed>
                        <tr>
                            <th>Id</th>
                            <th>Product name</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Categorie name</th>
                            <th>Categorie warehouse</th>
                            <th>Actions</th>
                        </tr>
                    </thed>
                    <tbody>
                    @foreach($newListProducts as $product)
                        <tr>
                            <td>{{ $product->getId() }}</td>
                            <td>{{ $product->getName() }}</td>
                            <td>{{ $product->getStock() }}</td>
                            <td>{{ $product->getPrice() }}</td>
                            <td>{{ $product->getCategorieName() }}</td>
                            <td>{{ $product->getCategorieWarehouse() }}</td>
                            <td>
                                <a href="/products/edit/{{$product->getId()}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/products/delete/{{$product->getId()}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/products/new" class="btn btn-sm btn-primary" role="button">New Product</a>
        </div>
    </div>
@endsection
