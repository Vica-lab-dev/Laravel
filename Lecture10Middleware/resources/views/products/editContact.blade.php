@extends("layout");

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@section("PageContent")
    <div class="Center">
        <form action="{{ route("updateContact", ['contact' => $contact->id]) }}" method="POST">

            {{ csrf_field() }}
            <label for="">Email</label>
            <input type="email" name="email" value="{{ $contact->email }}">

            <label for="">Subject</label>
            <input type="text" name="subject" value="{{ $contact->subject }}">

            <label for="">Message</label>
            <input type="text" name="message" value="{{ $contact->message }}">

            <button>Save</button>
        </form>
    </div>

@endsection
