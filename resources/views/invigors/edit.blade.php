<!-- app/views/invigors/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Look! I'm Editing!</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('invigors') }}">Products</a>
    </div>
    <ul class="nav navbar-nav">>
        <li><a href="{{ URL::to('invigors/create') }}">Create a Product</a>
    </ul>
</nav>

<h1>Edit {{ $invigor->name }}</h1>

<!-- if there are creation errors, they will show here -->
{{ Html::ul($errors->all()) }}

{{ Form::model($invigor, array('route' => array('invigors.update', $invigor->id), 'method' => 'PUT', 'files' => true)) }}

    <div class="form-group">
        {{ Form::label('image','Product Image') }}
        {{ Form::file('image', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::text('description', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Edit the Product!', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>