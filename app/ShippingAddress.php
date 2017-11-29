<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
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
        "shipping_address_id",
        "shipping_amount",
        "shipping_description",
        "shipping_method",
        "shipping_tax_amount",
        "status",
        "subtotal",
        "tax_amount",
        "updated_at",
    ];

}
