<?php

namespace App\Http\Controllers;

use App\Actions\ProductStoreAction;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products', ['products' => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(StoreProductRequest $request, ProductStoreAction $action)
    {
        return $action->execute($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'product deleted'
        ]);
    }
}
