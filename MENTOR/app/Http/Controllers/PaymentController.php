<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\User;

class PaymentController extends Controller
{
    public function checkout() {
        return view('checkout');
    }

    public function store(Request $request) {
        $payment = Payment::create([
            'user_id' => auth()->user()->id,
            'card_type' => $request->card_type,
            'total' => $request->total,
            'created_at' => now()
        ]);

        return redirect()->route('payment.receipt', ['id' => $payment->id]);
    }

    public function receipt($id) {
        $payment = Payment::findOrFail($id);
        $user = User::findOrFail($payment->user_id);

        return view('receipt', [
            'payment' => $payment,
            'user' => $user,
            'refNumber' => str_pad($payment->id, 7, '0', STR_PAD_LEFT)
        ]);
    }
}