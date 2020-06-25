<html>
<head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>New Client</title>
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
                            New Clients
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="/client" method="POST">
                            @csrf
                            <div style="margin-bottom: 0px!important" class="form-group">
                                <label for="name">Client Name</label>
                                <input type="text" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="name" placeholder="Client Name">
                            </div>

    @if($errors->has('name'))
                            <div style="display: inline-block" class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
    @endif

                            <div style="margin-bottom: 0px!important ; margin-top: 10px!important; " class="form-group">
                                <label for="age">Client Age</label>
                                <input type="number" min="0" id="age" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" name="age" placeholder="Client Age">
                            </div>

    @if($errors->has('age'))
                                <div style="display: inline-block" class="invalid-feedback">
                                    {{ $errors->first('age') }}
                                </div>
    @endif

                            <div style="margin-bottom: 0px!important ; margin-top: 10px!important; " class="form-group">
                                <label for="address">Client Address</label>
                                <input type="text" id="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" placeholder="Client Address">
                            </div>

    @if($errors->has('address'))
                                <div style="display: inline-block" class="invalid-feedback">
                                    {{ $errors->first('address') }}
                                </div>
    @endif

                            <div style="margin-bottom: 0px!important ; margin-top: 10px!important; " class="form-group {{ $errors->has('email') ? 'is-invalid' : '' }}">
                                <label for="email">Client Email</label>
                                <input type="text" id="email" class="form-control" name="email" placeholder="Client Email">
                            </div>

    @if($errors->has('email'))
                                <div style="display: inline-block" class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
    @endif

                            <button style=" margin-top: 10px!important;" type="submit" class="btn btn-primary btn-small">Save</button>
                            <button style=" margin-top: 10px!important;" type="cancel" class="btn btn-primary btn-small">Cancel</button>
                        </form>
                    </div>

    @if($errors->any())
                    <div class="card-footer">
        @foreach($errors->all() as $error)
                    <div class="alert alert-danger" role="alert">
                        {{ $error }}
                    </div>
        @endforeach
                    </div>
    @endif

                </div>
            </div>
        </div>
    </main>
    @if(isset($errors))
        {{ printf($errors) }}<br>
        {{ print_r($errors) }}<br>
        {{ var_dump($errors) }}<br>
         <?php echo ( $errors ) ?><br>
        {{ dd($errors) }}
    @endif
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
</body>
</html>
