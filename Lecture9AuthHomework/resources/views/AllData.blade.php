@extends("BootstrapLink")


<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">City</th>
        <th scope="col">Temperature</th>
        <th scope="col">Action</th>

    </tr>
    </thead>
    @foreach($allData as $data)
    <tbody>
    <tr>
        <th scope="row">{{ $data->id }}</th>
        <td>{{ $data->city }}</td>
        <td>{{ $data->temperature }}°C</td>
        <td>
            <a href="{{route("SingleData", ["data" => $data->id])}}" class="btn btn-primary">Edit</a>
            <a href="{{route("deleteData", ["data" => $data->id])}}" class="btn btn-danger">Delete</a>
        </td>
    </tr>


    </tbody>
    @endforeach
</table>
