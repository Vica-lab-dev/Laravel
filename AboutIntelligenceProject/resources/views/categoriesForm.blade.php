@extends('cdn')

@section('content')
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="card shadow p-4" style="max-width: 500px; width: 100%;">
            <h3 class="card-title text-center mb-4">Add Intelligence Category</h3>

            <form method="POST" action="{{ route('category.create') }}">
                @csrf

                @foreach($information as $info)
                    <input type="hidden" value="{{ $info->id }}" name="information_id">
                @endforeach

                <div class="mb-3">
                    <label for="categoryID" class="form-label">Choose your intelligence category</label>
                    <select class="form-select" id="categoryID" name="category" required>
                        <option selected disabled>-- Select category --</option>
                        <option value="Linguistic intelligence">Linguistic intelligence</option>
                        <option value="Logical-mathematical intelligence">Logical-mathematical intelligence</option>
                        <option value="Visual-spatial intelligence">Visual-spatial intelligence</option>
                        <option value="Musical intelligence">Musical intelligence</option>
                        <option value="Bodily-kinesthetic intelligence">Bodily-kinesthetic intelligence</option>
                        <option value="Interpersonal intelligence">Interpersonal intelligence</option>
                        <option value="Intrapersonal intelligence">Intrapersonal intelligence</option>
                        <option value="Naturalistic intelligence">Naturalistic intelligence</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="percentID" class="form-label">Enter the percentage for the category</label>
                    <input type="number" class="form-control" id="percentID" name="percent" placeholder="0-100%" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Save</button>
            </form>
        </div>
    </div>
@endsection
