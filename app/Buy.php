<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    public $timestamps = false;

    public function _product() {
        return $this->belongsTo('App\Product','product');
    }

    public function user() {
        return $this->belongsTo('App\User','customer');
    }
}
