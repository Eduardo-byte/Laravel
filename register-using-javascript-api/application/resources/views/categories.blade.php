@extends('layout.app' , ["current" => "categories"]) {{-- current is the variable that we want to pass to app.blade.php and categories is the value of the variable / then we will verify this on the navbar.blade.php--}}

@section('body')
    <div class="card border">
        <div class="card-body">
            <h5 class="card-title">Categorie register</h5>
            @if(count($lisCategories) > 0)
                <table class="table table-ordered table-hover">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Categorie name</th>
                            <th>Warehouse</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($lisCategories as $cat)
                        <tr>
                            <td>{{ $cat->id }}</td>
                            <td>{{ $cat->name }}</td>
                            <td>{{ $cat->warehouse }}</td>
                            <td>
                                <a href="/categories/edit/{{$cat->id}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/categories/delete/{{$cat->id}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="card-footer">
            <a href="/categories/new" class="btn btn-sm btn-primary" role="button">New Categorie</a>
        </div>
    </div>
@endsection
