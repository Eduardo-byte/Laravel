@extends('layout.app' , ["current" => "home"]) {{-- current is the variable that we want to pass to app.blade.php and home is the value of the variable / then we will verify this on the navbar.blade.php--}}

@section('body')

    <div class="jumbotron bg-light border border-secondary">
        <div class="row d-flex justify-content-center">

            <div class="card-deck">
                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Product Register</h5>
                        <p class="card-text">
                            Here you register all your products.
                            Don't forget to register first the categories
                        </p>
                        <a href="/products" class="btn btn-primary"> Register your products </a>
                    </div>
                </div>

                <div class="card border border-primary">
                    <div class="card-body">
                        <h5 class="card-title">Categories Register</h5>
                        <p class="card-text">
                            Regist your product categories.
                        </p>
                        <a href="/categories" class="btn btn-primary"> Register your Categories </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
