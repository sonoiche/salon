<?php

namespace App\DataTables\Reports;

use App\Models\ProductOrder;
use Carbon\Carbon;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class CustomerDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function (User $user) {
                return isset($user->created_at) ? $user->created_at->format('d M Y') : '';
            })
            ->editColumn('fname', function (User $user) {
                return $user->fullname;
            })
            ->editColumn('complete_address', function (User $user) {
                $address    = $user->address ?? '';
                $city       = $user->city ?? '';
                $zip_code   = $user->zip_code ?? '';

                return $address . ' ' . $city . ' ' . $zip_code;
            })
            ->editColumn('total_spent', function (User $user) {
                return isset($user->total_purchase) ? 'P' . number_format($user->total_purchase, 2) : '';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        $daterange  = $this->daterange;
        $client_id  = $this->client_id;
        if($client_id) {
            $customer_ids = ProductOrder::where('client_id', $client_id)->distinct()->pluck('customer_id');
            return $model->when($daterange, function ($query, $daterange) use ($customer_ids) {
                $date = explode('-', $daterange);
                $from = Carbon::parse($date[0])->format('Y-m-d');
                $to   = Carbon::parse($date[1])->format('Y-m-d');
    
                $query->whereBetween(DB::raw("date(created_at)"), [$from, $to])
                    ->whereIn('id', $customer_ids)
                    ->where('role', 'Customer');
            });
        }

        return $model->when($daterange, function ($query, $daterange) {
            $date = explode('-', $daterange);
            $from = Carbon::parse($date[0])->format('Y-m-d');
            $to   = Carbon::parse($date[1])->format('Y-m-d');

            $query->whereBetween(DB::raw("date(created_at)"), [$from, $to]);
        })->where('role', 'Customer');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('customer-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('print')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make(['data' => 'created_at', 'title' => 'Date Registered']),
            Column::make(['data' => 'fname', 'title' => 'Customer Name']),
            Column::make(['data' => 'email', 'title' => 'Email Address']),
            Column::make(['data' => 'contact_number', 'title' => 'Contact Number']),
            Column::make(['data' => 'total_spent', 'title' => 'Total Spent']),
            Column::make(['data' => 'complete_address', 'title' => 'Complete Address']),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Customer_' . date('YmdHis');
    }
}
