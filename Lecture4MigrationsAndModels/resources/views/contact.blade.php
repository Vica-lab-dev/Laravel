@extends("layout")

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @section("PageTitle")
        Contact
    @endsection

    @section("form")
        <div>
            <form class="Center marginTop marginBottom">
                <input type="email" name="email" placeholder="Enter your email">
                <input type="text" name="subject" placeholder="Subject">
                <input type="text" name="message" placeholder="Enter you message">
                <button>Send</button>
            </form>
        </div>
    @endsection

    @section("map")
        <div class="Centering maringTop marginBottom">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2028.280510468694!2d20.51364987163479!3d44.033341462759545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47576a659e384a67%3A0xdf422be0c46c9836!2z0JPQvtGA0ZrQuCDQnNC40LvQsNC90L7QstCw0YY!5e0!3m2!1ssr!2srs!4v1760812723659!5m2!1ssr!2srs" style="border: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    @endsection
