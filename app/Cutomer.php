<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cutomer extends Model
{
    protected $table= 'cutomers';
    protected $fillable=[
        'cus_name',
'nic',
'address',
'mobile',
'area',
    ];
}
