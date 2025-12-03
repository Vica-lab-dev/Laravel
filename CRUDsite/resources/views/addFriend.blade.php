@extends("cdnlink");

<form method="POST" action="{{route('addedFriend')}}">

    {{ csrf_field() }}

    <div class="mb-3">
        <label for="authName" class="form-label">Auth Name</label>
        <input type="text" class="form-control" id="authName" name="authName" value="{{ auth()->user()->name}}">
    </div>

    <div class="mb-3">
        <label for="authEmail" class="form-label">Auth Email</label>
        <input type="text" class="form-control" id="authEmail" name="authEmail" value="{{ auth()->user()->email}}">
    </div>

    <div class="mb-3">
        <label for="authId" class="form-label">Auth ID</label>
        <input type="text" class="form-control" id="authId" name="authID" value="{{ auth()->user()->id}}">
    </div>

    <div class="mb-3">
        <label for="friendsID" class="form-label">Friends ID</label>
        <input type="text" class="form-control" id="friendsID" name="friends_id" value="{{ $user->id }}" readonly>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
