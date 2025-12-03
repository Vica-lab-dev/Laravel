@extends("cdnlink");

<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
    </tr>
    </thead>
    <tbody>

        <tr>

            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('foundFriend', ['user' => $user->id])}} " class="btn btn-primary">Add Friends</a>
            </td>
        </tr>

    </tbody>
</table>
