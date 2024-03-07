<?php

namespace App\Http\Controllers;

use App\Interface\InvoiceReportRepositoryInterface;
use Illuminate\Http\Request;

class Invoices_Report extends Controller
{
    private $Invoice_Report;

    public function __construct(InvoiceReportRepositoryInterface $Invoice_Report)
    {
        $this->Invoice_Report = $Invoice_Report;
    }
    public function index()
    {
        return $this->Invoice_Report->index();
    }
    public function Search_invoices(Request $request)
    {
        return $this->Invoice_Report->Search_invoices($request);
    }
}
