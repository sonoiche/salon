<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number');
            $table->integer('customer_id');
            $table->bigInteger('quantity')->nullable();
            $table->decimal('amount', 8, 2)->nullable();
            $table->enum('payment_method', ['GCash','Cash'])->nullable();
            $table->enum('payment_status', ['Pending','Paid','Cancelled']);
            $table->string('proof_of_payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_orders');
    }
};
