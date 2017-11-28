<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
* App\Company

 * @property int $id
 * @property string $company_name
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @mixin \Eloquent
 */

class Company extends Model
{
    protected $table = "companies";

    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
                "id",
                "company_name",
           ];
}