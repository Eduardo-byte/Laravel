<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Clients</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <style>
        body{
            padding: 20px;
        }
    </style>
</head>
<body>
<main role="main">
    <div class="row">
        <div class="container col-md-8 offset-md-2">
            <div class="card border ">
                <div class="card-header">
                    <div class="card-title">
                        Clients
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="clientstable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Address</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $c)
                                <tr>
                                    <td>{{ $c->id }}</td>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->age }}</td>
                                    <td>{{ $c->address }}</td>
                                    <td>{{ $c->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/newclient" class="btn btn-sm btn-primary" role="button"> New Client</a>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
