<?php

namespace App\Http\Controllers;

use App\CategorieProduct;
use App\Product;
use Illuminate\Http\Request;

use App\Categorie;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lisCategories = Categorie::all();
        return view('categories' , compact('lisCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newCategorie' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Categorie();
        $cat->name = $request->input('categorieName');
        $cat->warehouse = $request->input('warehouse');
        $cat->save();
        return redirect()->route('categories');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Categorie::find($id);
        if(isset($cat)){
            return view('editCategorie' , compact('cat'));
        }
        return redirect('categories');
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
        $cat = Categorie::find($id);
        if(isset($cat)){
            $cat->name = $request->input('categorieName');
            $cat->warehouse = $request->input('warehouse');
            $cat->save();
            return redirect('categories');
        }else{
            echo ("tente novamente");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Categorie::find($id);
        if(isset($cat)){
            //$categorieForeign = CategorieProduct::where('categorie_id' , '=' , $cat->id)->firstOrFail();
            //$product = Product::where('id' , '=' , $categorieForeign->product_id)->firstOrFail();
            //$productCategorieToUpdate = CategorieProduct::where('categorie_id' , '=' , $cat->id)->update(['product_id' =>  0 , 'categorie_id'=> 0 ]);
            $cat->delete();
        }
        return redirect('categories');
    }
}
