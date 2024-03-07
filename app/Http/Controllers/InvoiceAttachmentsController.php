<?php

namespace App\Http\Controllers;

use App\Models\invoice_attachments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Interface\InvoiceAttachmentsRepositoryInterface;

class InvoiceAttachmentsController extends Controller
{
    private $Invoice_Attachments;

    public function __construct(InvoiceAttachmentsRepositoryInterface $Invoice_Attachments)
    {
        $this->Invoice_Attachments = $Invoice_Attachments;
    }

    public function store(Request $request)
    {
        $this->validate($request, [

        'file_name' => 'mimes:pdf,jpeg,png,jpg',

        ], [
        'file_name.mimes' => 'صيغة المرفق يجب ان تكون   pdf, jpeg , png , jpg',
        ]);

        return $this->Invoice_Attachments->store($request);
    }

}
