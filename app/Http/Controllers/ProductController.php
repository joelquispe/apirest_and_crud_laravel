<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['products'] = Product::paginate(5);
        return view('product.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = [
            'nombre'=>'required|string',
            'precio'=>'required|string',
            'descripcion'=>'required|string',
            'marca'=>'required|string',
            'foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
       
        $mensaje =[
            'required'=>'El :attribute es requerido',
            'foto.required'=>'La foto es requerida'
        ];
        $this->validate($request,$fields,$mensaje);
        //
        $dataProduct = request()->except("_token");
        if($request->hasFile("foto")){
            $dataProduct['foto'] =$request->file('foto')->store('uploads','public');
        }
        Product::insert($dataProduct);
        // return  response()->json($dataProduct);
        return redirect('product')->with('mensaje','Producto Agregado');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $dataProduct = request()->except(['_token','_method']);

        if($request->hasFile("foto")){
            $product = Product::findOrFail($id);
            Storage::delete('public/'.$product->foto);
            $dataProduct['foto'] =$request->file('foto')->store('uploads','public');
        }

        Product::where('id','=',$id)->update($dataProduct);

        $product = Product::findOrFail($id);
        return redirect('product')->with('mensaje','Producto borrado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $product = Product::findOrFail($id);
        if(Storage::delete('public/'.$product->foto)){
            Product::destroy($id);
        }
        
         return redirect('product')->with('mensaje','Producto borrado');
    }
}
