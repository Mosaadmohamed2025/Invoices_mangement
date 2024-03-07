<?php

namespace App\Interface;
use Illuminate\Database\Eloquent\Model;


interface InvoiceAttachmentsRepositoryInterface{
    public function store($request);
}
