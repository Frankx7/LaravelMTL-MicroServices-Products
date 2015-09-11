<?php
namespace App\Http\Transformers;

use App\Product;

class ProductTransformer extends \League\Fractal\TransformerAbstract
{
    public function transform(Product $product)
    {
        $images = [];

        foreach($product->images as $image) {
            $images[] = $image->path;
        }

        return [
            'id' => (int)$product->id,
            'name' => $product->name,
            'description' => $product->description,
            'price' => (float)($product->price / 100),
            'images' => $images
        ];
    }
}