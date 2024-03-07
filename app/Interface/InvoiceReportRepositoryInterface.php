<?php

namespace App\Interface;
use Illuminate\Database\Eloquent\Model;


interface InvoiceReportRepositoryInterface{
    public function index();
    public function Search_invoices($request);
}
