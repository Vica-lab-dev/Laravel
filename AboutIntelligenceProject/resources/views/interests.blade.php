@extends('cdn')

<form action="{{ route('interest.all') }}" method="POST">

    @csrf

    <div >
        <h1 style="font-size: 1.3rem">What kind of intelligence interests you?</h1>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Linguistic intelligence" id="flexCheckChecked" name="interests[]">
        <label class="form-check-label" for="flexCheckChecked">
            Linguistic intelligence
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Logical-mathematical intelligence" id="flexCheckChecked" name="interests[]">
        <label class="form-check-label" for="flexCheckChecked">
            Logical-mathematical intelligence
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Visual-spatial intelligence" id="flexCheckChecked" name="interests[]">
        <label class="form-check-label" for="flexCheckChecked">
            Visual-spatial intelligence
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Musical intelligence" id="flexCheckChecked" name="interests[]">
        <label class="form-check-label" for="flexCheckChecked">
            Musical intelligence
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Bodily-kinesthetic intelligence" id="flexCheckChecked" name="interests[]">
        <label class="form-check-label" for="flexCheckChecked">
            Bodily-kinesthetic intelligence
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Interpersonal intelligence" id="flexCheckChecked" name="interests[]">
        <label class="form-check-label" for="flexCheckChecked">
            Interpersonal intelligence
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Intrapersonal intelligence" id="flexCheckChecked" name="interests[]">
        <label class="form-check-label" for="flexCheckChecked">
            Intrapersonal intelligence
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="Naturalistic intelligence" id="flexCheckChecked" name="interests[]">
        <label class="form-check-label" for="flexCheckChecked">
            Naturalistic intelligence
        </label>
    </div>

    <button href="{{ route('describing') }}" class="btn btn-primary">Discover</button>
</form>
