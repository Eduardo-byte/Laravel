<?php

namespace App\Http\Controllers;
use App\NewProduct;
use App\Categorie;
use App\CategorieProduct;
use App\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        $listProducts = Product::all();
        $newListProducts=[];
        foreach ($listProducts as $value){
            $newProduct = new NewProduct();
            $newProduct->setId($value->id);
            $newProduct->setName($value->name);
            $newProduct->setStock($value->stock);
            $newProduct->setPrice($value->price);
            $categorieProduct = CategorieProduct::where('product_id' , '=' , $newProduct->getId())->firstOrFail();
            try{
                //foreach ($listCategorieProduct as $categorieProduct)
                $queryCategorie = Categorie::where('id', '=', $categorieProduct->categorie_id)->firstOrFail();
                $newProduct->setCategorieName($queryCategorie->name);
                $newProduct->setCategorieWarehouse($queryCategorie->warehouse);
            }catch(ModelNotFoundException $e){
                $newProduct->setCategorieName("no categorie");
                $newProduct->setCategorieWarehouse("no warehouse");
            }


            array_push($newListProducts, $newProduct);
        }
        return view('products' , compact(  'newListProducts' ));
    }

    /* $query = Categorie::all();
 for( $x = 0; $x < sizeof($query); $x++ ){
     if ($query[$x]->id == $value->categorie_id){
         $newProduct->setCategorieName($query[$x]->name);
         $newProduct->setCategorieWarehouse($query[$x]->warehouse);
     }
 }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorie = Categorie::all();
        return view('newProduct' , compact('categorie'));
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
        $product->name = $request->input('productName');
        $product->stock = $request->input('stock');
        $product->price = $request->input('price');
        //$product->categorie_id = $request->input('categorie');
        $newProductCategorie = $product ->id;
        $product->save();

        $categorieProduct = new CategorieProduct();
        $categorieProduct -> product_id = $product->id;
        $categorieProduct -> categorie_id = $request->input('categorie');
        $categorieProduct -> save();
        return redirect()->route('products');
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
        $categorie = Categorie::all();
        $product = Product::find($id);
        $productCategorie = CategorieProduct::where('product_id' , '=' , $product->id)->firstOrFail();
        if(isset($product)){
            return view('editProduct' , compact('product' , 'categorie' , 'productCategorie'));
        }
        return redirect('products');
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
        if(isset($product)){
            $product->name = $request->input('productName');
            $product->stock = $request->input('stock');
            $product->price = $request->input('price');
           //$product->categorie_id = $request->input('categorie');

            $categorieToUpdate = CategorieProduct::where('product_id' , '=' , $product->id)->update(['product_id'=>$product->id , 'categorie_id' => $request->input('categorie')]);

            //$categorieToDelete = CategorieProduct::where('product_id' , '=' , $product->id)->delete();
            //$categorieProduct = new CategorieProduct();
            //$categorieProduct -> product_id = $product->id;
            //$categorieProduct -> categorie_id = $request->input('categorie');
            //$categorieProduct -> save();

            $product->save();

            return redirect('products');
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
        $product = Product::find($id);
        if (isset($product)){
            $product->delete();
        }
        return redirect('products');
    }
}
