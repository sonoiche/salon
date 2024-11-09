<?php

namespace App\DataTables\Reports;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Subscription;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class SubscriptionDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function (Subscription $subscription) {
                return $subscription->created_at->format('d F Y');
            })
            ->editColumn('client_name', function (Subscription $subscription) {
                $client = Client::where('user_id', $subscription->user_id)->first();
                return $client->name ?? 'No Client Name';
            })
            ->editColumn('amount', function (Subscription $subscription) {
                return 'P' . $subscription->amount;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Subscription $model): QueryBuilder
    {
        $daterange = $this->daterange;
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
            ->setTableId('subscription-table')
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
            Column::make(['data' => 'created_at', 'title' => 'Payment Date']),
            Column::make(['data' => 'reference_number', 'title' => 'Reference Number']),
            Column::make(['data' => 'client_name', 'title' => 'Client Name']),
            Column::make(['data' => 'amount', 'title' => 'Amount'])
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Subscription_' . date('YmdHis');
    }
}
