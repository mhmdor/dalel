<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <section class="content" style="padding:20px 30%;">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                   @foreach ($city as $item)
             
                   @foreach ($item as $item1)
                   <div class="container">
                    <div class="">
                        <h1>{{$item1->place->name}}</h1>
                        <h1>{{$item1->value}}</h1>
                        <h1>{{$item1->place->subcity->name}}</h1>
                        <h1>{{$item1->place->subcity->city->name}}</h1>
                      
                    </div>
                    </div> 
                   @endforeach
                   
                   @endforeach
                </div>
                
            </div>
        </div>
    </section>
</body>

</html>
