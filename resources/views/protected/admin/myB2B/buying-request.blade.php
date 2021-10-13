@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')

    <hr class=".text-danger">

    @if (session()->has('flash_message'))
        <p>{{ session()->get('flash_message') }}</p>
        @endif
                <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">
                <h3>All buying request</h3>
                <table class="table table-striped table-bordered table-hover order-table" id="sample_1">
                    <thead>
                    <tr class="test-center">
                        <th>Name</th>
                        <th>Sender</th>
                        <th>Reciver</th>
                        <th>Status</th>
                        <th>permision</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="trade_table_body">
                    @foreach($bdtdc_supllier_inqueries_all as $module)
                        <tr>
                            <td>{{ $module->inquery_title }}</td>
                            <td>{{ $module->sender }}</td>
                            <td>{{ $module->product_owner_id }}</td>
                            <td>{{ $module->status }}</td>
                            <td>{{ $module->active }}</td>
                            <td>
                                <a href="{{ URL::to('admin/module-edit',$module->id) }}" class="btn btn-xs btn-info">Edit</a>
                                <a href="{{ URL::to('admin/module-delete',$module->id) }}" class="btn btn-xs btn-danger">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>

        <!-- END PAGE CONTENT-->

@stop
@section('scripts')
    <script>
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
            TableManaged.init();
        });
    </script>

    <!-- END JAVASCRIPTS -->
@stop
