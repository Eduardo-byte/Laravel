@extends('layout.app' , ['current' => "products"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <form action="/products" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nameProduct">New Product</label>
                    <input type="text" class="form-control" name="productName" id="productName" placeholder="Product">
                    <input type="text" class="form-control" name="stock" id="stock" placeholder="stock">
                    <input type="text" class="form-control" name="price" id="price" placeholder="price">
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Product categorie</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="categorie">
@foreach($categorie as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
@endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="/products" class="btn btn-sm btn-primary" role="button">Cancel</a>
            </form>
        </div>
        <div class="card-footer">
            <a href="/products" class="btn btn-sm btn-primary" role="button">Back</a>
        </div>
    </div>

@endsection
