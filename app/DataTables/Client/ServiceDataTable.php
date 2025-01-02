<?php

namespace App\DataTables\Client;

use App\Models\Client;
use App\Models\SalonService;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ServiceDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function (SalonService $salon) {
                return $salon->created_at->format('d F, Y');
            })
            ->addColumn('action', 'client.services.action')
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(SalonService $model): QueryBuilder
    {
        $client = Client::where('user_id', auth()->user()->id)->first();
        return $model->join('services','services.id','=','salon_services.service_id')
            ->select('services.name','salon_services.*')
            ->where('salon_services.client_id', $client->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('service-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Brtip')
            ->orderBy(1)
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
            Column::make(['data' => 'name', 'title' => 'Service Name']),
            Column::make(['data' => 'price', 'title' => 'Service Price']),
            Column::make('description'),
            Column::make('status')
                ->sortable(false),
            Column::make(['data' => 'created_at', 'title' => 'Created Date']),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Service_' . date('YmdHis');
    }
}
