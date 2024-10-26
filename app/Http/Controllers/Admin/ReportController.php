<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Reports\CustomerDataTable;
use App\DataTables\Reports\SubscriptionDataTable;

class ReportController extends Controller
{
    public function subscriptions(SubscriptionDataTable $dataTable, Request $request)
    {
        $data['page_title'] = 'Reports';
        $data['header']     = 'Subscription Report';
        $daterange          = $request['daterange'] ?? Carbon::now()->subDays(29)->format('m/d/Y') . '-' . Carbon::now()->format('m/d/Y');
        return $dataTable->with('daterange', $daterange)->render('admin.reports.subscriptions.index', $data);
    }

    public function customers(CustomerDataTable $dataTable, Request $request)
    {
        $data['page_title'] = 'Reports';
        $data['header']     = 'Customer Report';
        $daterange          = $request['daterange'] ?? Carbon::now()->subDays(29)->format('m/d/Y') . '-' . Carbon::now()->format('m/d/Y');
        return $dataTable->with('daterange', $daterange)->render('admin.reports.customers.index', $data);
    }
}
