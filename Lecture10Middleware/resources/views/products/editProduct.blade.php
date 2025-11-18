@extends("layout")

@section("PageContent")

    <div>
        <form action="{{ route('updateProduct', ['product'=> $product->id]) }}" method="POST">
            {{ csrf_field() }}
            <label for="name">Name:</label>
            <input type="text" name="name"  value="{{ $product->name }}">

            <label for="description">Description:</label>
            <input type="text" name="description" value="{{ $product->description }}">

            <label for="amount">Amount:</label>
            <input type="text" name="amount" value="{{ $product->amount }}">

            <label for="price">Price:</label>
            <input type="text" name="price" value = "{{ $product->price }}">

            <button>Save</button>
        </form>

    </div>

@endsection
