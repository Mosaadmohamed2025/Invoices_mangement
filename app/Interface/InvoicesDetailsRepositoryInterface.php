<?php

namespace App\Interface;
use Illuminate\Database\Eloquent\Model;


interface InvoicesDetailsRepositoryInterface{
    public function edit($id);

    public function destroy($request);

    public function get_file($invoice_number,$file_name);

    public function open_file($invoice_number,$file_name);
}
