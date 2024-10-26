<?php

namespace App\DataTables\Reports;

use Carbon\Carbon;
use App\Models\Appointment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class AppointmentDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('appointment_date', function (Appointment $appointment) {
                $schedule = $appointment->appointment_date . ' ' . $appointment->appointment_time;
                return Carbon::parse($schedule)->format('F d, Y h:i A');
            })
            ->editColumn('customer_name', function (Appointment $appoinment) {
                return $appoinment->customer->fullname ?? '';
            })
            ->editColumn('service_name', function (Appointment $appoinment) {
                return $appoinment->service->name ?? '';
            })
            ->editColumn('amount', function (Appointment $appoinment) {
                return isset($appoinment->amount) ? 'P' . number_format($appoinment->amount, 2) : '';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Appointment $model): QueryBuilder
    {
        $daterange  = $this->daterange;
        return $model->when($daterange, function ($query, $daterange) {
            $date = explode('-', $daterange);
            $from = Carbon::parse($date[0])->format('Y-m-d');
            $to   = Carbon::parse($date[1])->format('Y-m-d');

            $query->whereBetween(DB::raw("date(created_at)"), [$from, $to]);
        });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('appointment-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(0)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('print'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make(['data' => 'appointment_date', 'title' => 'Schedule Date']),
            Column::make(['data' => 'customer_name', 'title' => 'Customer Name'])
                ->sortable(false)
                ->searchable(false),
            Column::make(['data' => 'service_name', 'title' => 'Service Name'])
                ->sortable(false)
                ->searchable(false),
            Column::make(['data' => 'amount', 'title' => 'Service Amount']),
            Column::make(['data' => 'status', 'title' => 'Status'])
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Appointment_' . date('YmdHis');
    }
}
