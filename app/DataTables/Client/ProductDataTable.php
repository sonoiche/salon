<?php

namespace App\DataTables\Client;

use App\Models\Client;
use App\Models\Product;
use App\Models\SalonProduct;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('feature_photo', function (Product $product) {
                $salonProduct = SalonProduct::where('product_id', $product->id)->first();
                return '<img src="' .$salonProduct->feature_photo. '" class="img-thumbnail" />';
            })
            ->editColumn('created_at', function (Product $product) {
                return $product->created_at->format('d F, Y');
            })
            ->addColumn('action', 'client.products.action')
            ->setRowId('id')
            ->rawColumns(['feature_photo','action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Product $model): QueryBuilder
    {
        $user   = auth()->user();
        $client = Client::where('user_id', $user->id)->first();
        return $model->select([
            'salon_products.id',
            'salon_products.amount',
            'products.name',
            'salon_products.product_sku',
            'salon_products.status',
            'salon_products.created_at'
        ])
        ->join('salon_products','salon_products.product_id','=','products.id')
        ->where('salon_products.client_id', $client->id);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(2)
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
            Column::make(['data' => 'feature_photo', 'title' => 'Image'])
                ->searchable(false)
                ->sortable(false)
                ->printable(false),
            Column::make(['data' => 'product_sku', 'title' => 'SKU']),
            Column::make(['data' => 'name', 'title' => 'Product Name']),
            Column::make('amount')->searchable(false),
            Column::make('status'),
            Column::make(['data' => 'created_at', 'title' => 'Date Created']),
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
        return 'Product_' . date('YmdHis');
    }
}
