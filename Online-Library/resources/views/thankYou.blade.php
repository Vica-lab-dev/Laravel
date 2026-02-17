@php use Illuminate\Support\Facades\Auth; @endphp
@extends('bootstraplink')

<div class="container mt-5 d-flex justify-content-center">
    <div class="card shadow" style="max-width: 500px; width: 100%;">
        <div class="card-body text-center">
            <h5 class="card-title text-success">Thank you for your order!</h5>
            <p class="card-text">
                Enjoy your reading and have a great day
            </p>

            <p class="text-muted small mt-3">
                Once your payment is processed, you will receive access to your purchased books.
            </p>

            <hr>

            <h6 class="mt-3">Payment Details</h6>
            <p class="mb-1"><strong>Bank Account (IBAN):</strong> BA39 0000 0000 0000 0000</p>
            <p class="mb-1"><strong>Account Name:</strong> Your Company Name</p>
            <p class="mb-1"><strong>Reference:</strong> Order ID #{{ $id }}</p>
            <p class="small text-muted mt-2">
                Please include your order number as payment reference.
            </p>
        </div>
    </div>
</div>
