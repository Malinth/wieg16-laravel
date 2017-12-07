<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GroupPrice extends Model
{

    protected $primaryKey = 'price_id';


    protected $fillable = [
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

