<?php


namespace App\Repository;
use App\Exports\InvoicesExport;
use App\Models\invoice_attachments;
use App\Models\invoices;
use App\Models\invoices_details;
use App\Models\section;
use App\Models\User;
use App\Notifications\AddInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Interface\InvoiceAttachmentsRepositoryInterface;
use App\Models\products;
use Maatwebsite\Excel\Facades\Excel;


class InvoiceAttachmentsRepository implements InvoiceAttachmentsRepositoryInterface
{

    public function store($request)
    {


        $image = $request->file('file_name');
        $file_name = $image->getClientOriginalName();

        $attachments = new invoice_attachments();
        $attachments->file_name = $file_name;
        $attachments->invoice_number = $request->invoice_number;
        $attachments->invoice_id = $request->invoice_id;
        $attachments->Created_by = Auth::user()->name;
        $attachments->save();

        $imageName = $request->file_name->getClientOriginalName();
        $request->file_name->move(public_path('Attachments/' . $request->invoice_number), $imageName);

        session()->flash('Add', 'تم اضافة المرفق بنجاح');
        return back();

    }
}
