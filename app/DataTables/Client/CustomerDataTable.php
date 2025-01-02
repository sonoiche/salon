<?php

namespace App\DataTables\Client;

use App\Models\User;
use App\Models\Client;
use App\Models\ProductOrder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
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
                return $user->created_at->format('d M Y');
            })
            ->editColumn('customer_name', function (User $user) {
                return $user->fullname;
            })
            ->filterColumn('customer_name', function($query, $keyword) {
                $query->whereRaw("CONCAT(fname, ' ', lname) LIKE ?", ["%{$keyword}%"]);
            })
            ->editColumn('complete_address', function (User $user) {
                $address    = $user->address ?? '';
                $city       = $user->city ?? '';
                $zip_code   = $user->zip_code ?? '';

                return $address . ' ' . $city . ' ' . $zip_code;
            })
            ->filterColumn('complete_address', function($query, $keyword) {
                $query->whereRaw("CONCAT(address, ' ', city, ' ',zip_code) LIKE ?", ["%{$keyword}%"]);
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
        $user_id      = auth()->user()->id;
        $client       = Client::where('user_id', $user_id)->first();
        $customer_ids = isset($client->id) ? ProductOrder::where('client_id', $client->id)->distinct()->pluck('customer_id') : [];
        return $model->where('role', 'Customer')->whereIn('id', $customer_ids);
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
            Column::make(['data' => 'customer_name', 'title' => 'Customer Name']),
            Column::make(['data' => 'total_spent', 'title' => 'Total Spent'])
                ->sortable(false)
                ->searchable(false),
            Column::make(['data' => 'complete_address', 'title' => 'Complete Address'])
                ->sortable(false)
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
