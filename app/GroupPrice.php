<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPrice extends Model
{
    public $incrementing = false;
    public $timestamps = false;


    protected $fillable = [
        'id',
        'group_id',
        'price',
        'price_id',
        'product_id'
    ];




    public function group() {
        return $this->belongsTo(Group::class);
    }


    public function product() {
        return $this->belongsTo(Product::class);
    }



}

