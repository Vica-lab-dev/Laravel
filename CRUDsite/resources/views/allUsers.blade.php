@extends("cdnlink")
@include("navigation");
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>

    </tr>
    </thead>
    <tbody>
    @foreach($allUsers as $user)
    <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('findFriends', ['user' => $user->id])}}">View</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
