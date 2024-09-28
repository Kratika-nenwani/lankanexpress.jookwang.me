<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('check_points', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); // Explicitly defining order_id
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade'); // Adding foreign key constraint
            $table->text('checkpoint_location');
            $table->dateTime('checkpoint_date_time');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_points');
    }
};
