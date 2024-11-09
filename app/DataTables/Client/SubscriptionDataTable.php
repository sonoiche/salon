<?php

namespace App\DataTables\Client;

use App\Models\Subscription;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

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
            ->editColumn('amount', function (Subscription $subscription) {
                return 'P' . $subscription->amount;
            })
            ->editColumn('proof_of_payment', function (Subscription $subscription) {
                if(isset($subscription->proof_of_payment)) {
                    return '<a href="' .$subscription->proof_of_payment. '" class="btn btn-outline-primary btn-sm" target="_blank"><i class="bi bi-download"></i> &nbsp; ' . basename($subscription->proof_of_payment) . '</a>';
                }
            })
            ->setRowId('id')
            ->rawColumns(['proof_of_payment']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Subscription $model): QueryBuilder
    {
        $user_id = auth()->user()->id;
        return $model->where('user_id', $user_id);
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
                Button::make('print'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make(['data' => 'created_at', 'title' => 'Date']),
            Column::make(['data' => 'reference_number', 'title' => 'Reference Number']),
            Column::make(['data' => 'amount', 'title' => 'Amount']),
            Column::make('status')
                ->addClass('text-center')
                ->sortable(false),
            Column::make(['data' => 'proof_of_payment', 'title' => 'Proof'])
                ->addClass('text-center')
                ->sortable(false)
                ->printable(false),
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
