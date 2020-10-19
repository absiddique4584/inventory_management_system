<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{



    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $products = Product::all();
        return view('product.index',compact('products'));
    }




    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(){
        return view('product.create');
    }





    /**
     * @param Request $request
     */
    public function store(Request $request){
        $request->validate([
            'product_name'=>'required',
            'product_code'=>'required',
            'details'=>'required',
            'logo'=>'required',
        ]);

        $logo    = $request->file('logo');
        $fileEx   = $logo->getClientOriginalExtension();
        $fileName = date('Ymdhis.') . $fileEx;
        $logo->move(public_path('uploads/product/'), $fileName);

         Product::create([
            'product_name'     => $request->product_name,
            'product_code'     => $request->product_code,
            'details'          => $request->details,
             'logo'            => $fileName,
        ]);
        return redirect()->route('product.index')
            ->with('success','product Has been successfully inserted');
    }




    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id){
        $product = Product::find($id);
        //return $products;
        return view('product.edit',compact('product'));
    }




    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id){

       $product=Product::find($id);
        $request->validate([
            'product_name'=>'required',
            'product_code'=>'required',
            'details'=>'required',
            'logo'=>'required',
        ]);

        $logo    = $request->file('logo');
        $fileEx   = $logo->getClientOriginalExtension();
        $fileName = date('Ymdhis.') . $fileEx;
        $logo->move(public_path('uploads/product/'), $fileName);

         $product->update([
             'product_name'     => $request->product_name,
             'product_code'     => $request->product_code,
             'details'          => $request->details,
             'logo'            => $fileName,
        ]);



        return redirect()->route('product.index')
            ->with('success','product Has been successfully Updated');

    }




    /**
     * @param $id
     * delete data by id
     */
    public function delete($id){
        $product = Product::find($id);
        $image_path = public_path()."/uploads/product/";
        $image = $image_path. $product->logo;
        if(file_exists($image)){
            @unlink($image);
        }
        $product->delete();
        return redirect()->route('product.index')
            ->with('success','product Has been successfully Deleted');
    }



}
