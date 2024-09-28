<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'orders';

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'transaction_id',
         'service_type',
        'container_transportation',
        'parcel_deliveries',
        'additional_services',
        'sender_name',
        'sender_phone',
        'sender_email',
        'sender_id',
        'sender_image',
        'sender_pickup_address',
        'sender_street_address',
        'sender_city',
        'sender_state',
        'sender_country',
        'receiver_name',
        'receiver_phone',
        'receiver_email',
        'receiver_delivery_address',
        'receiver_city',
        'receiver_state',
        'receiver_country',
        'number_of_parcels',
        'weight',
        'length',
        'height',
        'width',
        'content',
        'item_value',
        'insurance_level',
    ];
    
    public function user()
{
    return $this->belongsTo(User::class);
}
}
