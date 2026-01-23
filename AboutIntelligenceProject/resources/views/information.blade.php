@extends('cdn')

<p>{{ $information->name }}</p>
<p>{{ $information->email }}</p>
<p>{{ $information->country }}</p>
<a class="btn btn-primary" href="{{ route('allInformation.show') }}">Let's create intelligence category</a>
