<!-- app/resources/views/invigors/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>My index Page</title>
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

<h1>All the Products</h1>

<!-- will be used to show any messages -->
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <td>ID</td>
            <td>Image</td>
            <td>Name</td>
            <td>Price</td>
            <td>Description</td>
            <td>Actions</td>
        </tr>
    </thead>
    <tbody>
    @forelse($invigors as $key => $value)
        <tr>
            <td>{{ $value->id }}</td>
            <td><a href="invigors/{{ $value->id }}">{{ Html::image($value->image_name,"Invigor",array('height'=>'100','width'=>'100')) }}</a></td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->price }}</td>
            <td>{{ $value->description }}</td>

            <!-- we will also add show, edit, and delete buttons -->
            <td>

                <!-- delete the product (uses the destroy method DESTROY /nerds/{id} -->
                {{ Form::open(array('url' => 'invigors/' . $value->id)) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete this Product', array('class' => 'btn btn-small btn-warning')) }}
                {{ Form::close() }}

                <!-- show the Products(uses the show method found at GET /invigors/{id} -->
                <a class="btn btn-small btn-success" href="{{ URL::to('invigors/' . $value->id) }}">Show this Product</a>

                <!-- edit this Product (uses the edit method found at GET /invigors/{id}/edit -->
                <a class="btn btn-small btn-info" href="{{ URL::to('invigors/' . $value->id . '/edit') }}">Edit this Product</a>

            </td>
        </tr>

    @empty
    <tr>
    <td>
        <p>There are no products yet!</p>
    </td>
    </tr>
    @endforelse  
    </tbody>
</table>
{{ $invigors->links() }} 
</div>
</body>
</html>


