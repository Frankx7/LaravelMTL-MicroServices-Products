<?php
namespace App;

use \Illuminate\Database\Eloquent\Model;

class Product extends Model {
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }
}