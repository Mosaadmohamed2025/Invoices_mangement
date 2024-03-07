<?php

namespace App\Interface;
use Illuminate\Database\Eloquent\Model;


interface InvoiceAchiveRepositoryInterface{
    public function index();

    public function destroy($request);

    public function update($request);
}
