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
use App\Interface\InvoiceReportRepositoryInterface;
use App\Models\products;
use Maatwebsite\Excel\Facades\Excel;


class InvoiceReportRepository implements InvoiceReportRepositoryInterface{
    public function index(){
        return view('reports.invoices_report');
    }
    public function Search_invoices($request){

        $rdio = $request->rdio;

        if ($rdio == 1) {

            if ($request->type && $request->start_at =='' && $request->end_at =='') {

                $invoices = invoices::select('*')->where('Status','=',$request->type)->get();
                $type = $request->type;
                return view('reports.invoices_report',compact('type'))->withDetails($invoices);
            }

            else {

                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $type = $request->type;

                $invoices = invoices::whereBetween('invoice_Date',[$start_at,$end_at])->where('Status','=',$request->type)->get();
                return view('reports.invoices_report',compact('type','start_at','end_at'))->withDetails($invoices);

            }

        }

        else {

            $invoices = invoices::select('*')->where('invoice_number','=',$request->invoice_number)->get();
            return view('reports.invoices_report')->withDetails($invoices);

        }
    }
}
