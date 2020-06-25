<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
class ProductController extends Controller
{
    public function indexView(){
        return view('products');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return $products -> toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        $product->categorie_id = $request->input('categorie_id');
        $product->save();
        return json_encode($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (isset($product)){
            return json_encode($product);
        }
        return response('Product not found', 404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if (isset($product)){
            $product->name = $request->input('name');
            $product->stock = $request->input('stock');
            $product->price = $request->input('price');
            $product->categorie_id = $request->input('categorie_id');
            $product->save();
            return json_encode($product);
        }
        return response('Product not found', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (isset($product)){
            $product->delete();
            return response('OK', 200);
        }
        return response('Product not found', 404);
    }
}
