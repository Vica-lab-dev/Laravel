@extends('cdn')
    <form method="POST" action="{{ route('category.create') }}">

        @csrf

        <select class="form-select" aria-label="Default select example" name="category" required>
            <option selected disabled>Choose your intelligence category</option>
            <option value="1">Linguistic intelligence</option>
            <option value="2">Logical-mathematical intelligence</option>
            <option value="3">Visual-spatial intelligence</option>
            <option value="4">Musical intelligence</option>
            <option value="5">Bodily-kinesthetic intelligence</option>
            <option value="6">Interpersonal intelligence</option>
            <option value="7">Intrapersonal intelligence</option>
            <option value="8">Naturalistic intelligence</option>
        </select>

        <div class="mb-3">
            <label for="percentID" class="form-label">Enter the percentage for the category</label>
            <input type="number" class="form-control" id="percentID" name="percent" required>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>

    </form>


