<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{

    public function create($data): Product
    {
        $product = new Product();
        $product->fill($data);
        $product->save();

        return $product;
    }
}
