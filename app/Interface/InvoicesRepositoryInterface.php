<?php

namespace App\Interface;
use Illuminate\Database\Eloquent\Model;


interface InvoicesRepositoryInterface{
    public function index();

    public function create();

    public function store($request);

    public function show($id);

    public function edit($id);

    public function update( $request,  $invoices);

    public function destroy($request);

    public function getproducts($id);

    public function export();
    public function Status_Update($id, $request);

    public function Invoice_Paid();

    public function Invoice_unPaid();

    public function Invoice_Partial();

    public function Print_invoice($id);

    public function MarkAsRead_all ($request);

    public function unreadNotifications_count();

    public function unreadNotifications();

}
