<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(\Auth::user()->is_admin == 1){
          return view("products", ["products" => Product::all()]);
        }else{
          return redirect("/");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->is_admin == 1){
          return view("product_insert");
        }else{
          return redirect("/");
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
          'id' => 'required',
          //'catalog_page' =>
          'brand' => 'required',
          'description' => 'required',
          'packing' => 'required',
          //'remarks' =>
          'piece_price' => 'required',
          'case_price' => 'required',
        ]);

        //dd(request()->all());

        $pID = request('id');

        if($request->hasFile('img_link')){
          $image = $request->file('img_link');
          $imgName = request('description') . '.' . $image->getClientOriginalExtension();
          Image::make($image)->resize(200, 200)->save( public_path('/images/') . $imgName);
        } else {
          $imgName = 'Fireworks-generic.jpg';
        }

        $pPage = request('catalog_page');
        $pBrand = request('brand');
        $pDesc = request('description');
        $pPack = request('packing');
        $pRemarks = request('remarks');
        $pPiece = request('piece_price');
        $pCase = request('case_price');

        $newProduct = new Product;
        $newProduct->id = $pID;
        $newProduct->img_link = '/images/' . $imgName;
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
