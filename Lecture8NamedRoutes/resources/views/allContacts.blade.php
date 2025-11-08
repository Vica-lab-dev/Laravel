@extends('layout')

@section('PageContent')

    <table class="table table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Message</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($allContacts as $contact)
                <tr>
                    <td>{{$contact->id}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->subject}}</td>
                    <td>{{$contact->message}}</td>
                    <td>
                        <a href="{{ route("deleteContact", ["contact" => $contact->id]) }}" class="btn btn-danger">Delete</a>
                        <a href=" {{ route('editContact', ['id' => $contact->id]) }}" class="btn btn-primary">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
