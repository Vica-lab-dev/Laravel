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

<table class="table">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">URL</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($allPages as $page)
    <tr>
        <th scope="row">{{ $page->id }}</th>
        <td>{{ $page->name }}</td>
        <td>{{ $page->description }}</td>
        <td>{{ $page->url }}</td>
        <td>
            <a class="btn btn-primary" href="{{ route('admin.edit', ['page' => $page->id]) }}">Edit</a>
            <a class="btn btn-danger" href="{{ route('admin.delete', ['page' => $page->id]) }}">Delete</a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
