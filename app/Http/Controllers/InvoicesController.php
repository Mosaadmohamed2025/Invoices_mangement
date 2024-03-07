<?php

namespace App\Http\Controllers;


use App\Interface\InvoicesRepositoryInterface;
use App\Models\User;
use App\Notifications\AddInvoice;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\invoices;
use App\Models\invoices_details;
use App\Models\invoice_attachments;
use App\Models\section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreInvoiceRequest;


class InvoicesController extends Controller
{
    private $Invoices;

    public function __construct(InvoicesRepositoryInterface $Invoices)
    {
        $this->Invoices = $Invoices;
    }

    public function index()
    {
        return $this->Invoices->index();
    }

    public function create()
    {
       return $this->Invoices->create();
    }

    public function store(StoreInvoiceRequest $request)
    {
       return $this->Invoices->store($request);
    }

    public function export(){
        return $this->Invoices->export();
    }
    public function show($id)
    {

      return $this->Invoices->show($id);
    }
    public function edit($id)
    {
        return $this->Invoices->edit($id);
    }
    public function update(Request $request, invoices $invoices)
    {
       return $this->Invoices->update($request , $invoices);
    }
    public function destroy(Request $request)
    {
        return $this->Invoices->destroy($request);
    }
    public function getproducts($id)
    {
        return $this->Invoices->getproducts($id);

    }
    public function Status_Update($id, Request $request)
    {
        return $this->Invoices->Status_Update($id , $request);
    }
    public function Invoice_Paid()
    {
        return $this->Invoices->Invoice_Paid();
    }
    public function Invoice_unPaid()
    {
        return $this->Invoices->Invoice_unPaid();
    }
    public function Invoice_Partial()
    {
        return $this->Invoices->Invoice_Partial();
    }
    public function Print_invoice($id)
    {
        return $this->Invoices->Print_invoice($id);
    }
    public function MarkAsRead_all (Request $request){
        return $this->Invoices->MarkAsRead_all($request);
    }
    public function unreadNotifications_count()
    {
        return $this->Invoices->unreadNotifications_count();
    }
}
