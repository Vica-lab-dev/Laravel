<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">

    <title>Document</title>
</head>
<body>


    <table class="border">

        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Price</th>
                <th>Image</th>
            </tr>
        </thead>

        <tbody>
            @foreach($allProducts as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->amount}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->image}}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

</body>
</html>
