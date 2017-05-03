<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductOrder;
use Illuminate\Http\Request;

class ProductOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    public function create(Request $request)
    {
        $this->validate(request(), [
            "product" => "required",
            "quantity" => "required",
        ]);

        $productOrder = new ProductOrder;
        $productOrder->product()->associate(Product::find($request->product));
        $productOrder->quantity = $request->quantity;

        if ($request->session()->has("products")) {
            $products = session("products");
        }
        $products[] = $productOrder;
        $request->session()->put("products", $products);
        return redirect()->back();
    }
}
