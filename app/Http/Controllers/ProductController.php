<?php
namespace App\Http\Controllers;

use App\Product;
use App\Http\Transformers\ProductTransformer;
use Illuminate\Http\Request;

class ProductController extends ApiController
{

    public function index()
    {
        $places = Product::take(10)->get();
        return $this->respondWithCollection($places, new ProductTransformer);
    }


    public function show($id)
    {
        $product = Product::find($id);

        if(!$product)
            return $this->errorNotFound('Product not found');

        return $this->respondWithItem($product, new ProductTransformer);
    }

    public function store(Request $request)
    {

        $validation = $validator = $this->isValid($request, [
            'name' => 'required|max:255',
            'description' => 'required',
            'price' => 'numeric|required'
        ]);

        if ($validation->fails()) {
            $this->setStatusCode(400);
            return $this->respondWithError($validation->getMessageBag()->all(), self::CODE_WRONG_ARGS);
        }

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = round($request->price * 100);
        $product->save();

        return $this->respondWithItem($product, new ProductTransformer);
    }
}
