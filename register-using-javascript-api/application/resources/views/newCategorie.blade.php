@extends('layout.app' , ['current' => "categories"])

@section('body')

    <div class="card border">
        <div class="card-body">
            <form action="/categories" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nameCategorie">Categorie Name</label>
                    <input type="text" class="form-control" name="categorieName" id="categorieName" placeholder="Categorie">
                    <input type="text" class="form-control" name="warehouse" id="warehouse" placeholder="warehouse">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Save</button>
                <a href="/categories" class="btn btn-sm btn-primary" role="button">Cancel</a>
            </form>
        </div>
        <div class="card-footer">
            <a href="/categories" class="btn btn-sm btn-primary" role="button">Back</a>
        </div>
    </div>

@endsection
