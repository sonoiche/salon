<?php

namespace App\DataTables\Client;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

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
        return $model->where('role', 'Customer');
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
            Column::make(['data' => 'total_spent', 'title' => 'Total Spent']),
            Column::make(['data' => 'complete_address', 'title' => 'Complete Address'])
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
