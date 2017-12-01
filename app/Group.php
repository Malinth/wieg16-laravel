<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        'id',
        'customer_group_id',
        'tax_class_id',
        'customer_group_code',
    ];

    public function groupPrice() {
        return $this->hasMany(GroupPrice::class);
    }


    public function customer() {
        return $this->hasOne(Order::class);
    }

}
