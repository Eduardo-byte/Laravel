<html>
    <head>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Product Register</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" >
        <style>
            body{
                padding: 20px;
            }
            .navbar{
                margin: 20px;
            }
        </style>
    </head>
<body>
    <div class="container">
        @component('navbar' , ["current" => $current])  {{-- here we are saying to the navbar.blade.php that will receive a variable with the name current and the value is defined in the products/categories/app .blade.php --}}
        @endcomponent
        <main role="main">
            @hasSection('body')
                @yield('body')
            @endif
        </main>
    </div>


    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
