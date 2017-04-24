<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("products", ["products" => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("product_insert");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pID = request('id');
        //$imgPath = $request->file('img_link')->store('images/');
        $imgPath = "https://www.colourbox.com/preview/3866320-blue-festive-fireworks-at-night.jpg";
        $pPage = request('catalog_page');
        $pBrand = request('brand');
        $pDesc = request('description');
        $pPack = request('packing');
        $pRemarks = request('remarks');
        $pPiece = request('piece_price');
        $pCase = request('case_price');

        $newProduct = new Product;
        $newProduct->id = $pID;
        $newProduct->img_link = $imgPath;
        $newProduct->catalog_page = $pPage;
        $newProduct->brand = $pBrand;
        $newProduct->description = $pDesc;
        $newProduct->packing = $pPack;
        $newProduct->remarks = $pRemarks;
        $newProduct->piece_price = $pPiece;
        $newProduct->case_price = $pCase;

        $newProduct->save();
        //dd(request()->all());
        return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view("product", ["product" => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
