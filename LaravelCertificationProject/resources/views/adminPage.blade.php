@extends('bootstrap')

<form action="{{ route('admin.create') }}" method="POST">
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="PageID" class="form-label">Enter Page name</label>
        <input type="text" class="form-control" id="PageID" name="page">
    </div>
    <div class="mb-3">
        <label for="descriptionID" class="form-label">Enter page descritpion</label>
        <input type="text" class="form-control" id="descriptionID" name="description">
    </div>
    <div class="mb-3">
        <label for="urlID" class="form-label">Enter page URL</label>
        <input type="text" class="form-control" id="urlID" name="url">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
