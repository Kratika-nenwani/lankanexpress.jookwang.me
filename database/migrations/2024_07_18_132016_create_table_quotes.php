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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Explicitly defining category_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Adding foreign key constraint
            $table->enum('customer_type', ['customer_type', 'service_type']);
            $table->enum('service_type', ['AIR CARGO', 'SEA CARGO', 'ROAD TRANSPORTATION', '3PL SERVICES']);
            $table->boolean('container_transportation')->default(false);
            $table->boolean('parcel_deliveries')->default(false);
            $table->enum('additional_services', [
                'UPB OPERATIONS',
                'CUSTOM CLEARANCE',
                'BONDED TRUCKS',
                'BONDED WAREHOUSING',
                'CARGO INSURANCES',
                'INTERNATIONAL WAREHOUSING'
            ]);
            $table->string('sender_name');
            $table->string('sender_phone');
            $table->string('sender_email');
            $table->string('sender_address_line_1');
            $table->string('sender_address_line_2')->nullable();
            $table->string('sender_city');
            $table->string('sender_state_province_region');
            $table->string('sender_country');
            $table->string('receiver_name');
            $table->string('receiver_phone');
            $table->string('receiver_email');
            $table->string('receiver_address_line_1');
            $table->string('receiver_address_line_2')->nullable();
            $table->string('receiver_city');
            $table->string('receiver_state_province_region');
            $table->string('receiver_country');
            $table->string('number_of_parcels');
            $table->string('weight');
            $table->string('length');
            $table->string('height');
            $table->string('width');
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_quotes');
    }
};
