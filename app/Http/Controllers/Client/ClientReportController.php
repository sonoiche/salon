<?php

namespace App\Http\Controllers\Client;

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\Reports\CustomerDataTable;
use App\DataTables\Client\ProductOrderDataTable;
use App\DataTables\Reports\AppointmentDataTable;

class ClientReportController extends Controller
{
    public function customers(CustomerDataTable $dataTable, Request $request)
    {
        $client = Client::where('user_id', auth()->user()->id)->first();
        $data['page_title'] = 'Reports';
        $data['header']     = 'Customer Report';
        $daterange = $request['daterange'] ?? Carbon::now()->subDays(29)->format('m/d/Y') . '-' . Carbon::now()->format('m/d/Y');
        $client_id = $client->id;
        return $dataTable->with('daterange', $daterange)
            ->with('client_id', $client_id)
            ->render('client.reports.customers.index', $data);
    }

    public function appointments(AppointmentDataTable $dataTable)
    {
        $data['page_title'] = 'Reports';
        $data['header']     = 'Appointment Report';
        $daterange = $request['daterange'] ?? Carbon::now()->subDays(29)->format('m/d/Y') . '-' . Carbon::now()->format('m/d/Y');
        return $dataTable->with('daterange', $daterange)->render('client.reports.appointments.index', $data);
    }

    public function sales(ProductOrderDataTable $dataTable)
    {
        $data['page_title'] = 'Reports';
        $data['header']     = 'Sales Report';
        $daterange = $request['daterange'] ?? Carbon::now()->subDays(29)->format('m/d/Y') . '-' . Carbon::now()->format('m/d/Y');
        return $dataTable->with('daterange', $daterange)->render('client.reports.sales.index', $data);
    }
}
