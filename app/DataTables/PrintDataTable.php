<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Services\DataTable;
use App\SPKC;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use DB;

class PrintDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', 'printdatatable.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->select('id', 'add-your-columns-here', 'created_at', 'updated_at');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        //return $this->builder()
          //          ->columns($this->getColumns())
            //        ->minifiedAjax()
              //      ->addAction(['width' => '80px'])
                //    ->parameters($this->getBuilderParameters());
                return $this->builder()
                            ->columns($this->getColumns())
                            ->parameters([
                                'dom' => 'Bfrtip',
                                'buttons' => ['csv', 'export', 'print'],
                            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'add your columns',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Print_' . date('YmdHis');
    }
}
