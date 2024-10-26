<?php

namespace App\DataTables\Client;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\ProductOrder;
use App\Models\ProductOrderItem;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ProductOrderDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('created_at', function (ProductOrder $order) {
                return $order->created_at->format('d F, Y');
            })
            ->editColumn('fname', function (ProductOrder $order) {
                return $order->fname . ' ' . $order->lname;
            })
            ->editColumn('quantity', function (ProductOrder $order) {
                $product = ProductOrderItem::where('order_id', $order->id)->first();
                return $product->quantity ?? 0;
            })
            ->editColumn('amount', function (ProductOrder $order) {
                return 'P' . number_format($order->amount, 2);
            })
            ->editColumn('payment_status', function (ProductOrder $order) {
                if(isset($order->proof_of_payment)) {
                    return '<a href="'.url($order->proof_of_payment).'" class="btn btn-success btn-sm" target="_blank">View Proof</a>';
                }
            })
            ->addColumn('action', function (ProductOrder $order) {
                return view('client.orders.action', compact('order'));
            })
            ->rawColumns(['action','payment_status'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProductOrder $model): QueryBuilder
    {
        $user_id    = auth()->user()->id;
        $client     = Client::where('user_id', $user_id)->first();
        $daterange  = $this->daterange;
        return $model->join('users','users.id','=','product_orders.customer_id')
            ->select('users.fname','users.mname','users.lname','product_orders.*')
            ->where('product_orders.client_id', $client->id)
            ->when($daterange, function ($query, $daterange) {
                $date = explode('-', $daterange);
                $from = Carbon::parse($date[0])->format('Y-m-d');
                $to   = Carbon::parse($date[1])->format('Y-m-d');
    
                $query->whereBetween(DB::raw("date(product_orders.created_at)"), [$from, $to]);
            });
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('productorder-table')
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
            Column::make(['data' => 'created_at', 'title' => 'Transaction Date']),
            Column::make(['data' => 'fname', 'title' => 'Customer Name']),
            Column::make(['data' => 'invoice_number', 'title' => 'Invoice Number']),
            Column::make(['data' => 'quantity', 'title' => 'Quantity'])
                ->sortable(false)
                ->searchable(false)
                ->addClass('text-center'),
            Column::make(['data' => 'amount', 'title' => 'Total Amount']),
            Column::make(['data' => 'payment_status', 'title' => 'Payment'])
                ->sortable(false)
                ->searchable(false)
                ->printable(false)
                ->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ProductOrder_' . date('YmdHis');
    }
}
