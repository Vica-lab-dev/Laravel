<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    @section("PageTitle")
        Adding Products
    @endsection
</head>
<body>
    <div>
        <form class="Center" action="/admin/add-products" method="POST">

            @if($errors->any())
                <p>Warrning: {{$errors->first()}}</p>
            @endif

            {{ csrf_field() }}
            <input type="text" name="name" placeholder="Enter your name">
            <textarea name="description" placeholder="Description"></textarea>
            <input type="number" name="amount" placeholder="Amount">
            <input type="number" name="price" placeholder="Price">
            <input type="text" name="image" placeholder="example: image.jpg">
            <button>Add</button>
        </form>
    </div>

</body>
</html>
