<?php


namespace App\Interface;
use Illuminate\Database\Eloquent\Model;


interface ProductRepositoryInterface{

    public function index();

    public function store($request);

    public function update($request, $products);

    public function destroy($request);
}
