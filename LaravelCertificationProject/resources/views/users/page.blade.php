@extends('bootstrap')


<table class="table">
    <thead>
    <tr>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">URL</th>
    </tr>
    </thead>
    <tbody>
    @foreach($allPages as $page)
        <tr>
            <td>{{ $page->name }}</td>
            <td>{{ $page->description }}</td>
            <td>{{ $page->url }}</td>
            <td><a class="btn btn-primary" href="">Go</a></td>
        </tr>
    @endforeach
    </tbody>
</table>



