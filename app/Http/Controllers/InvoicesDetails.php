<?php

namespace App\Http\Controllers;
use App\Interface\InvoicesDetailsRepositoryInterface;
use App\Models\invoices;
use App\Models\invoices_details;
use App\Models\invoice_attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class InvoicesDetails extends Controller
{
    private $Invoices_Details;

    public function __construct(InvoicesDetailsRepositoryInterface $Invoices_Details)
    {
        $this->Invoices_Details = $Invoices_Details;
    }
   public function edit($id)
   {
       return $this->Invoices_Details->edit($id);
   }
   public function destroy(Request $request)
   {
       return $this->Invoices_Details->destroy($request);
   }
    public function get_file($invoice_number,$file_name)
    {
        return $this->Invoices_Details->get_file($invoice_number,$file_name);
    }
    public function open_file($invoice_number,$file_name){
        return $this->Invoices_Details->open_file($invoice_number,$file_name);
    }
}
