@php use Illuminate\Support\Facades\Auth; @endphp
@extends('bootstraplink')


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4 bg-light">
                <div class="card-header bg-primary text-white text-center rounded-top">
                    <h4 class="mb-0">Create Order</h4>
                </div>

                <div class="card-body p-5">
                    <form action="" method="">

                        <div class="form-floating mb-4">
                            <input
                                type="text"
                                name="client_name"
                                id="client_name"
                                class="form-control"
                                    value="{{Auth::user()->name}}"
                                required
                            >
                            <label for="client_name">Client Name</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input
                                type="text"
                                name="book_name"
                                id="book_name"
                                class="form-control"
                                    value="{{$book->name}}"
                                required
                            >
                            <label for="book_name">Book Name</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input
                                type="number"
                                name="price"
                                id="price"
                                class="form-control"
                                step="0.01"
                                    value="{{$book->price}}"
                                required
                            >
                            <label for="price">$</label>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                Save Order
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
