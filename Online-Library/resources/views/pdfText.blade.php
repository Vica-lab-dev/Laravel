@extends('bootstraplink')

<div class="container d-flex justify-content-center">
    <div class="p-4 shadow rounded bg-white" style="max-width: 800px; width: 100%;">
        <h2 class="text-center mb-4">{{ $book->name }}</h2>

        <pre style="white-space: pre-wrap; font-family: serif;">
{{ $text }}
        </pre>
    </div>
</div>
