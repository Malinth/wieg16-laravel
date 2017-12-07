<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{

    protected $primaryKey = 'customer_group_id';

    protected $fillable = [
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
