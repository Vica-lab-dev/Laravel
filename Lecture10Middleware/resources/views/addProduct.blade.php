    @extends("layout")

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


    @section("PageTitle")
        Adding Products
    @endsection
@section("Add")
    <div>
        <form class="Center" action="{{ route("saveProducts") }}" method="POST">



                @if($errors->any())
                    @foreach($errors->all as $error)
                        <p>Warrning: {{$errors->first()}}</p>
                    @endforeach
                @endif

            {{ csrf_field() }}
            <input type="text" name="name" placeholder="Enter your name" value="{{ old("name") }}">
            <textarea name="description" placeholder="Description" value= "{{ old("description") }}"></textarea>
            <input type="number" name="amount" placeholder="Amount" value= "{{ old("amount") }}">
            <input type="number" name="price" placeholder="Price" value="{{ old("price") }}">
            <input type="text" name="image" placeholder="example: image.jpg" value="{{ old("image") }}">
            <button>Add</button>
        </form>
    </div>

@endsection


