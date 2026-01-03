@extends('bootstrap')

<form action="{{ route('admin.update', ['page' => $page->id]) }}" method="POST">
    {{ csrf_field() }}
    <div class="mb-3">
        <label for="singleName" class="form-label">Enter new name</label>
        <input type="text" class="form-control" id="singleName" name="newName" value="{{ $page->name }}">
    </div>
    <div class="mb-3">
        <label for="singleDescription" class="form-label">Enter new description</label>
        <input type="text" class="form-control" id="singleDescription" name="newDescription" value="{{ $page->description }}">
    </div>
    <div class="mb-3">
        <label for="singleURL" class="form-label">Enter new URL</label>
        <input type="text" class="form-control" id="singleURL" name="newURL" value="{{ $page->url }}">
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
