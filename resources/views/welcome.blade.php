<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .contenu {
            background: linear-gradient(135deg, #172a74, #21a9af);
            background-color: #184e8e;
            height: 100vh;
            width: 100%;
        }
    </style>
</head>

<body class="antialiased ">
    <nav class="navbar navbar-dark bg-dark ">
        <a class="navbar-brand" href="#">Naoufel Charfeddine</a>
        <span class="navbar-text ">
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-3 sm:block">
                @auth
                <a href="{{ url('/home') }}" type="button" class="btn btn-dark">Home</a>
                @else
                <a href="{{ route('login') }}" type="button" class="btn btn-dark">Log in</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" type="button" class="btn btn-dark">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </span>
    </nav>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-0 sm:pt-0">


        <div class=" mx-auto sm:px-6   contenu">
<div class="container py-5">
<h1 class="text-center text-light mb-4"> Application web de genération de raccourci URL</h1>
<table class="table table-stripped table table-bordered text-light ">
            <thead>
                <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">URL</th>
                    <th scope="col">URL Shorted</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Ajay</td>
                    <td>Patna</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Rahul</td>
                    <td>Chandigarh</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Parush</td>
                    <td>Kolkata</td>
                </tr>
            </tbody>
        </table>
</div>
       



        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>

</html>