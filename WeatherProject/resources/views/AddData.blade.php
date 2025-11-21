@extends("BootstrapLink")

<form action="{{ route('SaveData') }}" method="POST">

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>Warrning: {{$errors->first()}}</p>
        @endforeach
    @endif

        {{ csrf_field() }}

    <div class="mb-3">
        <label for="City" class="form-label">Enter city</label>
        <input type="text" class="form-control" id="City" name="city">
    </div>
    <div class="mb-3">
        <label for="Temperature" class="form-label">Temperature</label>
        <input type="number" class="form-control" id="Temperature" name="temperature">
    </div>
    <button type="submit" class="btn btn-primary">Add</button>
</form>
