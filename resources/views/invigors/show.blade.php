<!-- app/views/invigors/show.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm Showing</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('invigors') }}">Products</a>
    </div>
    <ul class="nav navbar-nav">
        <li><a href="{{ URL::to('invigors/create') }}">Create a Product</a>
    </ul>
</nav>

<h1>Showing {{ $invigor->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $invigor->name }}</h2>
        <p>
            {{ Html::image($invigor->image_name, "Invigor") }}<br>
            <strong>Price:</strong> {{ $invigor->price }}<br>
            <strong>Description:</strong> {{ $invigor->description }}
        </p>
    </div>

</div>
</body>
</html>