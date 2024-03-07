<?php

namespace App\Providers;


use App\Interface\CustomerReportRepositoryInterface;
use App\Interface\InvoiceAchiveRepositoryInterface;
use App\Interface\InvoiceAttachmentsRepositoryInterface;
use App\Interface\InvoiceReportRepositoryInterface;
use App\Interface\InvoicesDetailsRepositoryInterface;
use App\Interface\InvoicesRepositoryInterface;
use App\Interface\ProductRepositoryInterface;
use App\Interface\SectionRepositoryInterface;
use App\Repository\CustomerReportRepository;
use App\Repository\InvoiceAchiveRepository;
use App\Repository\InvoiceAttachmentsRepository;
use App\Repository\InvoiceReportRepository;
use App\Repository\InvoicesDetailsRepository;
use App\Repository\InvoicesRepository;
use App\Repository\ProductRepository;
use App\Repository\SectionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(SectionRepositoryInterface::class, SectionRepository::class);
        $this->app->bind(InvoicesRepositoryInterface::class, InvoicesRepository::class);
        $this->app->bind(InvoiceReportRepositoryInterface::class, InvoiceReportRepository::class);
        $this->app->bind(CustomerReportRepositoryInterface::class, CustomerReportRepository::class);
        $this->app->bind(InvoicesDetailsRepositoryInterface::class, InvoicesDetailsRepository::class);
        $this->app->bind(InvoiceAttachmentsRepositoryInterface::class, InvoiceAttachmentsRepository::class);
        $this->app->bind(InvoiceAchiveRepositoryInterface::class, InvoiceAchiveRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
