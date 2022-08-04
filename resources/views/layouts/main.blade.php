<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
</head>

<body>
    <main>
        <div class="container pt-3">
            <div class="row">
                <div class="col-3">@include("components.filter")</div>
                <div class="col-9">@yield("content")</div>
            </div>
        </div>
    </main>
</body>

</html>