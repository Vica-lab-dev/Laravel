@php use App\Models\UsersComment; @endphp
@extends('bootstrap')

<table class="table">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">URL</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>{{ $page->name }}</td>
        <td>{{ $page->description }}</td>
        <td><i><b>{{ $page->url }}</b></i></td>
    </tbody>
</table>

<form action="{{ route('users.create') }}" method="POST">
    {{ csrf_field() }}
    <div class="mb-3">
        <input type="hidden" class="form-control" name="user_id" value="{{ auth()->user()->id }}">
        <label for="commentID" class="form-label"><i>Leave us a comment</i></label>
        <input type="text" class="form-control" id="commentID" name="comment">
        <button class="btn btn-primary">Comment</button>
    </div>
</form>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Comment</th>
    </tr>
    </thead>
    <tbody>
    @foreach(UsersComment::all() as $singleComment)
        <tr>
            <th scope="row">{{ $singleComment->userComment->name }}</th>
            <th><i>{{ $singleComment->comment }}</i></th>
            <td><a class="btn btn-danger" href="{{ route('users.delete', ['comment' => $singleComment->id]) }}">Delete comment</a></td>
        </tr>
    @endforeach
    </tbody>
</table>
