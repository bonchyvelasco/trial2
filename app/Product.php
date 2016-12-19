<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\User', 'owner');
    }

    public function buy() {
        return $this->hasMany('App\Buy');
    }

    public function setQtyAttribute($amount) {
        $this->attributes['qty'] = $amount;
        if ($this->attributes['qty'] <= 0) {
            $this->attributes['status'] = 'Out of Stock';
        } else {
            $this->attributes['status'] = 'In Stock';
        }
    }

    public function setStatusAttribute($value) {
        $this->attributes['status'] = $value;
    }
}
