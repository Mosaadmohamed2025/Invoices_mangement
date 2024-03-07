<?php

namespace App\Interface;
use Illuminate\Database\Eloquent\Model;


interface CustomerReportRepositoryInterface{
    public function index();

    public function Search_customers($request);

}
