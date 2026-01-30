
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">

    <title>Document</title>



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


