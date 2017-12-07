<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = "entity_id";


    protected $fillable = [
        "amount_package",
        "attribute_set_id",
        "entity_id",
        "entity_type_id",
        "has_options",
        "is_salable",
        "name",
        "required_options",
        "sku",
        "status",
        "stock_item",
        "is_in_stock",
        "type_id",
    ];

    public function groupPrice() {
        return $this->hasMany(GroupPrice::class);
    }


}
