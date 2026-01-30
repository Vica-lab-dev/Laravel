@extends ("layout")


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @section("PageTitle")
        Welcome
    @endsection




    @section("PageContent")
        @if($hour >= 0 && $hour <= 12)
            <p class="Center">Good Morning!</p>
        @else
            <p class="Center">Good Day!</p>
        @endif


        <p class="Center">Current hour: {{$hour}}</p>
        <p class="Center">Current time: {{ date("H:i:s") }}</p>


        @foreach($products as $product)
            <p class="Center">{{$product->name}}</p>
        @endforeach

        <form class="Center" action="/send-contact" method="POST">

            @if($errors->any())
                <p>Warnning: {{$errors->first()}}</p>
            @endif

            {{ csrf_field() }}
            <input type="email" name="email" placeholder="Enter your email">
            <input type="text" name="subject" placeholder="Enter a title">
            <textarea name="description"></textarea>
            <button>Send</button>

        </form>






    @endsection









