@extends('cdn')
<div class="container mt-4">
    <h4 class="mb-3">Which statements describe you?</h4>
    <p class="text-muted">Check the statements that apply to you.</p>

    <form method="POST" action="{{route('quiz.started')}}">

        @csrf

        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="linguistic" name="intelligences[]" value="linguistic">
            <label class="form-check-label" for="linguistic">
                I enjoy reading, writing, and expressing myself with words.
            </label>
        </div>

        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="logical" name="intelligences[]" value="logical">
            <label class="form-check-label" for="logical">
                I like solving problems, puzzles, or working with numbers and logic.
            </label>
        </div>

        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="spatial" name="intelligences[]" value="spatial">
            <label class="form-check-label" for="spatial">
                I think in images, visualize easily, and enjoy design or drawing.
            </label>
        </div>

        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="bodily" name="intelligences[]" value="bodily">
            <label class="form-check-label" for="bodily">
                I learn best by doing, moving, or using my body.
            </label>
        </div>

        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="musical" name="intelligences[]" value="musical">
            <label class="form-check-label" for="musical">
                I am sensitive to rhythm, music, sounds, or melodies.
            </label>
        </div>

        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="interpersonal" name="intelligences[]" value="interpersonal">
            <label class="form-check-label" for="interpersonal">
                I understand others well and enjoy interacting with people.
            </label>
        </div>

        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" id="intrapersonal" name="intelligences[]" value="intrapersonal">
            <label class="form-check-label" for="intrapersonal">
                I am self-aware and reflect deeply on my thoughts and emotions.
            </label>
        </div>

        <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="naturalistic" name="intelligences[]" value="naturalistic">
            <label class="form-check-label" for="naturalistic">
                I feel connected to nature, animals, or environmental patterns.
            </label>
        </div>

        <button type="submit" class="btn btn-primary">
            Result
        </button>
    </form>
</div>
