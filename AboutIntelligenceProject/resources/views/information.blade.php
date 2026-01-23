@extends('cdn')

<p>Your name: {{ $information->name }}</p>
<p>Your Email: {{ $information->email }}</p>
<p>Your country: {{ $information->country }}</p>
<a class="btn btn-primary" href="{{ route('allInformation.show') }}">Let's create intelligence category</a>
