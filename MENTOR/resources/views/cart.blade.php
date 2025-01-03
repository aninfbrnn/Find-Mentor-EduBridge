@extends('layouts.app')

@section('content')
<div class="container my-4" style="background-color:rgb(254, 254, 254); min-height: 100vh; padding: 20px; border-radius: 30px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('find-mentor') }}" class="btn btn-outline-primary">← Find Mentor</a>
        <h3 class="fw-bold">My Cart</h3>
    </div>

    @if ($cartItems->isEmpty())
        <p class="text-center">Your cart is empty. Add mentors from the <a href="{{ route('find-mentor') }}">Find Mentor</a> page.</p>
    @else
        <div class="list-group">
            @foreach ($cartItems as $item)
                <div class="list-group-item d-flex align-items-center gap-3">
                    <img src="/images/{{ $item->mentor->image ?? 'default.png' }}" alt="{{ $item->mentor->subject }}" class="rounded" style="width: 80px; height: auto;">
                    <div class="flex-grow-1">
                        <h5>{{ $item->mentor->subject }}</h5>
                        <p class="m-0 text-muted">Mentor: {{ $item->mentor->name }}</p>
                    </div>
                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex align-items-center">
                        @csrf
                        @method('PUT')
                        <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}" class="btn btn-outline-secondary" {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                        <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control mx-2 text-center" style="width: 60px;" readonly>
                        <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}" class="btn btn-outline-secondary" {{ $item->quantity >= 10 ? 'disabled' : '' }}>+</button>
                    </form>
                    <p class="m-0 fw-bold">${{ $item->mentor->price * $item->quantity }}</p>
                    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">
                            <img src="/images/trash.png" alt="Remove" style="width: 20px;">
                        </button>
                    </form>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('payment.checkout') }}" class="btn btn-lg text-white" style="background-color: #9D6BFF; border-radius: 50px; padding: 10px 30px;">
                Go to Payment
            </a>
        </div>
    @endif

</div>
@endsection
