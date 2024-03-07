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
use App\Interface\InvoicesDetailsRepositoryInterface;
use App\Models\products;
use Maatwebsite\Excel\Facades\Excel;


class InvoicesDetailsRepository implements InvoicesDetailsRepositoryInterface{

    public function edit($id)
    {
        $invoices = invoices::where('id',$id)->first();
        $details  = invoices_Details::where('id_Invoice',$id)->get();
        $attachments  = invoice_attachments::where('invoice_id',$id)->get();

        return view('invoices.details_invoice',compact('invoices','details','attachments'));
    }

    public function destroy($request)
    {
        $invoices = invoice_attachments::findOrFail($request->id_file);
        $invoices->delete();
        Storage::disk('public_uploads')->delete($request->invoice_number.'/'.$request->file_name);
        session()->flash('delete', 'تم حذف المرفق بنجاح');
        return back();
    }

    public function get_file($invoice_number, $file_name)
    {
        $file_path = public_path() . '/Attachments/' . $invoice_number . '/' . $file_name;

        if (file_exists($file_path)) {
            return response()->download($file_path);
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    }

    public function open_file($invoice_number, $file_name)
    {
        $file_path = public_path() . '/Attachments/' . $invoice_number . '/' . $file_name;

        if (file_exists($file_path)) {
            return response()->file($file_path);
        } else {
            return response()->json(['message' => 'File not found.'], 404);
        }
    }


}
