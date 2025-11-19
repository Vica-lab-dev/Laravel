@extends("BootstrapLink")

<form action="{{ route("UpdateData", ["data" => $data->id]) }}" method="POST">

    {{ csrf_field() }}

    <div class="mb-3">
        <label for="City" class="form-label">Enter city</label>
        <input type="text" class="form-control" id="City" name="city" value="{{$data->city}}">
    </div>
    <div class="mb-3">
        <label for="Temperature" class="form-label">Temperature</label>
        <input type="number" class="form-control" id="Temperature" name="temperature" value="{{$data->temperature}}">
    </div>
    <button type="submit" class="btn btn-primary">Edit</button>
</form>
