@extends('cdn')

@section('content')
    <div class="container text-center my-5">
        <h1 class="display-1 text-primary mb-4">Welcome to your own head</h1>

        <img class="img-fluid rounded shadow mb-4"
             src="https://sp-ao.shortpixel.ai/client/to_webp,q_glossy,ret_img,w_750,h_375/https://www.psypost.org/wp-content/uploads/2025/11/wireframe-brain-750x375.jpg"
             alt="Brain Image">

        <a class="btn btn-primary btn-lg w-50" href='/about-user'>Let's go, my friend!</a>
    </div>
@endsection
