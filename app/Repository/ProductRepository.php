<?php

namespace App\Repository;
use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interface\ProductRepositoryInterface;
use App\Models\products;


class ProductRepository implements ProductRepositoryInterface{
    public function index()
    {
        $sections = section::all();
        $products = products::all();

        return view('products.products' , compact('sections','products'));
    }

    public function store($request)
    {

        products::create([
            'Product_name' => $request->Product_name,
            'section_id' => $request->section_id,
            'description' => $request->description,
        ]);

        session()->flash('Add', 'تم اضافة المنتج بنجاح ');
        return redirect('/products');
    }

    public function update($request, $products)
    {
        $id = section::where('section_name', $request->section_name)->first()->id;

        $Products = products::findOrFail($request->pro_id);

        $Products->update([
            'Product_name' => $request->Product_name,
            'description' => $request->description,
            'section_id' => $id,
        ]);

        session()->flash('Edit', 'تم تعديل المنتج بنجاح');
        return back();
    }


    public function destroy($request)
    {
        $Products = products::findOrFail($request->pro_id);
        $Products->delete();
        session()->flash('delete', 'تم حذف المنتج بنجاح');
        return back();
    }

}
