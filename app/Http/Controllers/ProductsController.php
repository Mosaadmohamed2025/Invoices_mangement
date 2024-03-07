<?php

namespace App\Http\Controllers;

use App\Interface\ProductRepositoryInterface;
use App\Models\section;
use App\Models\products;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;

class ProductsController extends Controller
{

    private $Products;

    public function __construct(ProductRepositoryInterface $Products)
    {
        $this->Products = $Products;
    }

    public function index()
    {
       return $this->Products->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
      return $this->Products->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, products $products)
    {
        return $this->Products->update($request , $products);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
       return $this->Products->destroy($request);
    }
}
