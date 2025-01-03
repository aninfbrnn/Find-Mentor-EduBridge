@extends('layouts.app')

@section('content')
<div class="modal d-block text-center">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content p-4" style="border-radius: 20px;">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Payment Success!</h5>
            </div>
            <div class="modal-body">
                <p>Your payment has been successfully done.</p>
                <h4>Total Payment</h4>
                <h2>${{ number_format($payment->total, 2) }}</h2>

                <div class="text-start mt-4">
                    <p>Ref Number: <strong>{{ $refNumber }}</strong></p>
                    <p>Payment Time: <strong>{{ $payment->created_at->format('d M Y, H:i') }}</strong></p>
                    <p>Payment Method: <strong>{{ $payment->card_type }}</strong></p>
                    <p>Sender Name: <strong>{{ $user->name }}</strong></p>
                </div>

                <button id="print-btn" class="btn btn-secondary my-2">Get PDF Receipt</button>
            </div>
            <div class="modal-footer">
                <a href="{{ route('find-mentor') }}" class="btn btn-primary w-100">Done</a>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('print-btn').addEventListener('click', function () {
        window.print();
    });
</script>
@endsection