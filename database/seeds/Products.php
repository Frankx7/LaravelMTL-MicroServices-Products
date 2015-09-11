<?php

use Illuminate\Database\Seeder;

class Products extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('en_CA');
        for($i = 0; $i < 200; $i++) {
            $product = new App\Product;
            $product->name = $faker->name;
            $product->description = $faker->sentence;
            $product->price = $faker->numberBetween(1000, 100000);
            $product->save();

            for($imageIndex = 0; $imageIndex < rand(2, 5); $imageIndex++) {
                $image = new App\ProductImage;
                $image->name = $product->name . ' #' . ($imageIndex + 1);
                $image->description = '';
                $image->path = $faker->imageUrl;

                $product->images()->save($image);
            }
        }
    }
}
