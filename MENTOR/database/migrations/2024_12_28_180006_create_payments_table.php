<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('card_type');
            $table->string('name_on_card');
            $table->string('card_number', 16);
            $table->string('expiration_date');
            $table->string('cvv', 4);
            $table->decimal('subtotal', 10, 2);
            $table->decimal('app_fee', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};