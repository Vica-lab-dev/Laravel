@extends('cdn')
    <form method="POST" action="{{ route('category.create') }}">

        @csrf

        @foreach($information as $info)
            <input type="hidden" value="{{ $info->id }}" name="information_id">
        @endforeach

        <select class="form-select" aria-label="Default select example" name="category" required>
            <option selected disabled>Choose your intelligence category</option>
            <option value="Linguistic intelligence">Linguistic intelligence</option>
            <option value="Logical-mathematical intelligence">Logical-mathematical intelligence</option>
            <option value="Visual-spatial intelligence">Visual-spatial intelligence</option>
            <option value="Musical intelligence">Musical intelligence</option>
            <option value="Bodily-kinesthetic intelligence">Bodily-kinesthetic intelligence</option>
            <option value="Interpersonal intelligence">Interpersonal intelligence</option>
            <option value="Intrapersonal intelligence">Intrapersonal intelligence</option>
            <option value="Naturalistic intelligence">Naturalistic intelligence</option>
        </select>

        <div class="mb-3">
            <label for="percentID" class="form-label">Enter the percentage for the category</label>
            <input type="number" class="form-control" id="percentID" name="percent" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>


