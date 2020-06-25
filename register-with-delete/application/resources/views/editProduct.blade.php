@extends('layout.app' , ['current' => "products"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <form action="/products/{{ $product->id }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nameCategorie">Product Name</label>
                    <input type="text" class="form-control" name="productName" id="productName" placeholder="Product name" value="{{ $product->name }}">
                    <input type="text" class="form-control" name="stock" id="stock" placeholder="stock" value="{{ $product->stock }}">
                    <input type="text" class="form-control" name="price" id="price" placeholder="price" value="{{ $product->price }}">
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="categorie">
                        @foreach($categorie as $cat)
                            @if($cat->id === $productCategorie->categorie_id)
                                {{ $select = "selected" }}
                            @else
                                {{ $select = "" }}
                            @endif
                            <option {{$select}} value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="/products" class="btn btn-sm btn-danger" role="button">Cancel</a>
            </form>
        </div>
        <div class="card-footer">
            <a href="/products" class="btn btn-sm btn-primary" role="button">Back</a>
        </div>
    </div>

@endsection
