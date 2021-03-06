<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{

    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        "id",
        "address_type",
        "city",
        "company",
        "country",
        "country_id",
        "customer_address_id",
        "customer_id",
        "email",
        "firstname",
        "lastname",
        "postcode",
        "street",
        "telephone",
        "billing_address_id",
        "created_at",
        "customer_email",
        "grand_total",
        "order_id",
        "increment_id",

    ];

    public function order() {
        return $this->hasOne(Order::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }
}
