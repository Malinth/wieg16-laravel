<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        'id',
        'increment_id',
        'customer_id',
        'customer_email',
        'status',
        'marking',
        'grand_total',
        'subtotal',
        'tax_amount',
        'billing_address_id',
        'shipping_address_id',
        'shipping_method',
        'shipping_amount',
        'shipping_tax_amount',
        'shipping_description',
        'created_at',
        'updated_at'
    ];

    public function billingaddress(){
        // return $this->hasOne(BillingAddress::class);
        return $this->belongsTo(BillingAddress::class);
    }

    public function shippingaddress(){
        // return $this->hasOne(BillingAddress::class);
        return $this->belongsTo(BillingAddress::class);
    }

    public function items() {
        return $this->hasMany(Item::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
