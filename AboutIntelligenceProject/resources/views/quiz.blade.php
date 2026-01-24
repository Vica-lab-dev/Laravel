@extends('cdn')

@section('content')
    <style>
        .quiz-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            text-align: center;
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
        }
    </style>

    <div class="quiz-container">
        <h4 class="mb-3">Which statements describe you?</h4>
        <p class="text-muted">Check the statements that apply to you.</p>

        <form method="POST" action="{{ route('quiz.started') }}">
            @csrf

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="linguistic" name="intelligences[]" value="linguistic">
                <label class="form-check-label" for="linguistic">
                    I enjoy reading, writing, and expressing myself with words.
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="logical" name="intelligences[]" value="logical">
                <label class="form-check-label" for="logical">
                    I like solving problems, puzzles, or working with numbers and logic.
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="spatial" name="intelligences[]" value="spatial">
                <label class="form-check-label" for="spatial">
                    I think in images, visualize easily, and enjoy design or drawing.
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="bodily" name="intelligences[]" value="bodily">
                <label class="form-check-label" for="bodily">
                    I learn best by doing, moving, or using my body.
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="musical" name="intelligences[]" value="musical">
                <label class="form-check-label" for="musical">
                    I am sensitive to rhythm, music, sounds, or melodies.
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="interpersonal" name="intelligences[]" value="interpersonal">
                <label class="form-check-label" for="interpersonal">
                    I understand others well and enjoy interacting with people.
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="intrapersonal" name="intelligences[]" value="intrapersonal">
                <label class="form-check-label" for="intrapersonal">
                    I am self-aware and reflect deeply on my thoughts and emotions.
                </label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="naturalistic" name="intelligences[]" value="naturalistic">
                <label class="form-check-label" for="naturalistic">
                    I feel connected to nature, animals, or environmental patterns.
                </label>
            </div>

            <button type="submit" class="btn btn-primary mt-3">
                Result
            </button>
        </form>
    </div>
@endsection
