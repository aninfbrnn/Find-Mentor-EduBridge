@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card p-4" style="background-color: #E9E3FF; border-radius: 20px;">
        <h3 class="fw-bold">Payment</h3>
        <form action="{{ route('payment.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <h5>Card Details</h5>
            </div>

            <div class="mb-3">
                <label for="card_type">Card Type</label>
                <select name="card_type" id="card_type" class="form-select" required>
                    <option value="MasterCard">MasterCard</option>
                    <option value="Visa">Visa</option>
                    <option value="RuPay">RuPay</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="name_on_card">Name on Card</label>
                <input type="text" name="name_on_card" id="name_on_card" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="card_number">Card Number</label>
                <input type="text" name="card_number" id="card_number" class="form-control" required minlength="16" maxlength="16">
            </div>

            <div class="row mb-3">
                <div class="col">
                    <label for="expiration_date">Expiration Date</label>
                    <input type="text" name="expiration_date" id="expiration_date" class="form-control" placeholder="mm/yyyy" required>
                </div>
                <div class="col">
                    <label for="cvv">CVV</label>
                    <input type="text" name="cvv" id="cvv" class="form-control" required minlength="3" maxlength="4">
                </div>
            </div>

            <div class="mb-3">
                <p>Subtotal: ${{ number_format($subtotal, 2) }}</p>
                <p>App Fee: ${{ number_format($appFee, 2) }}</p>
                <p>Total (Tax Incl.): ${{ number_format($total, 2) }}</p>
            </div>

            <input type="hidden" name="subtotal" value="{{ $subtotal }}">
            <input type="hidden" name="app_fee" value="{{ $appFee }}">
            <input type="hidden" name="total" value="{{ $total }}">

            <button type="submit" class="btn btn-success w-100">
                ${{ number_format($total, 2) }} Checkout →
            </button>
        </form>
    </div>
</div>
@endsection
