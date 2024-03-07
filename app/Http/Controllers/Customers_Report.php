<?php

namespace App\Http\Controllers;

use App\Interface\CustomerReportRepositoryInterface;
use App\Models\invoices;
use App\Models\section;
use Illuminate\Http\Request;
class Customers_Report extends Controller
{

    private $customer_Report;

    public function __construct(CustomerReportRepositoryInterface $customer_Report)
    {
        $this->customer_Report = $customer_Report;
    }

    public function index()
    {
        return $this->customer_Report->index();
    }
    public function Search_customers(Request $request){
    return $this->customer_Report->Search_customers($request);
    }
}
