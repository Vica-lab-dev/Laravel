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

    <tbody>
    @foreach($allData as $data)
    <tr>
        <th scope="row">{{ $data->id }}</th>
        <td>{{ $data->city->name }}</td>
        <td>{{ $data->temperature }}°C</td>
        <td>
            <a href="{{ route('ForecastData',['city' => $data->id]) }}" class="btn btn-primary">View</a>
            <a href="{{route("SingleData", ["data" => $data->id])}}" class="btn btn-primary">Edit</a>
            <a href="{{route("deleteData", ["data" => $data->id])}}" class="btn btn-danger">Delete</a>
        </td>
    </tr>
    @endforeach

    </tbody>

</table>
