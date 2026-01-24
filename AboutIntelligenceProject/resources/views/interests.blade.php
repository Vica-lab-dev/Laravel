@extends('layout')

@section('content')
    <style>
        body {
            background: #f0f2f5;
        }

        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            font-size: 1.3rem;
            margin-bottom: 25px;
        }

        .form-check {
            display: flex;
            align-items: center;
            justify-content: flex-start; /* checkbox levo, label desno */
            gap: 12px; /* razmak između checkboxa i label */
            margin-bottom: 15px;
            text-align: left;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 1.1rem;
            border-radius: 8px;
            margin-top: 20px;
        }
    </style>

    <div class="form-container">
        <form action="{{ route('interest.all') }}" method="POST">
            @csrf

            <h1>What kind of intelligence interests you?</h1>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Linguistic intelligence" id="linguistic"
                       name="interests[]">
                <label class="form-check-label" for="linguistic">Linguistic intelligence</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Logical-mathematical intelligence" id="logical"
                       name="interests[]">
                <label class="form-check-label" for="logical">Logical-mathematical intelligence</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Visual-spatial intelligence" id="visual"
                       name="interests[]">
                <label class="form-check-label" for="visual">Visual-spatial intelligence</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Musical intelligence" id="musical"
                       name="interests[]">
                <label class="form-check-label" for="musical">Musical intelligence</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Bodily-kinesthetic intelligence" id="bodily"
                       name="interests[]">
                <label class="form-check-label" for="bodily">Bodily-kinesthetic intelligence</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Interpersonal intelligence" id="interpersonal"
                       name="interests[]">
                <label class="form-check-label" for="interpersonal">Interpersonal intelligence</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Intrapersonal intelligence" id="intrapersonal"
                       name="interests[]">
                <label class="form-check-label" for="intrapersonal">Intrapersonal intelligence</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="Naturalistic intelligence" id="naturalistic"
                       name="interests[]">
                <label class="form-check-label" for="naturalistic">Naturalistic intelligence</label>
            </div>

            <button type="submit" class="btn btn-primary">Discover</button>
        </form>
    </div>
@endsection
