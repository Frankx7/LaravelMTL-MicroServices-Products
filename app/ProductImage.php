<?php
namespace App;

use \Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}