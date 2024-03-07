<?php

namespace App\Repository;
use App\Exports\InvoicesExport;
use App\Interface\CustomerReportRepositoryInterface;
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


class CustomerReportRepository implements CustomerReportRepositoryInterface{
    public function index()
    {
        $sections = section::all();
        return view('reports.customers_report',compact('sections'));

    }

    public function Search_customers($request){

        if ($request->Section && $request->product && $request->start_at =='' && $request->end_at=='') {


            $invoices = invoices::select('*')->where('section_id','=',$request->Section)->where('product','=',$request->product)->get();
            $sections = section::all();
            return view('reports.customers_report',compact('sections'))->withDetails($invoices);


        }
        else {

            $start_at = date($request->start_at);
            $end_at = date($request->end_at);

            $invoices = invoices::whereBetween('invoice_Date',[$start_at,$end_at])->where('section_id','=',$request->Section)->where('product','=',$request->product)->get();
            $sections = section::all();
            return view('reports.customers_report',compact('sections'))->withDetails($invoices);


        }
    }
}
