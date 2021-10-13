@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')

    @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
    @endif
		
				<!-- END PAGE HEADER-->
				<!-- BEGIN PAGE CONTENT-->
				<div class="row">
					<div class="col-md-12">
						<div class="note note-danger note-bordered">
							
						</div>
						<!-- Begin: life time stats -->
						<div class="portlet light">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift font-green-sharp"></i>
									<span class="caption-subject font-green-sharp bold uppercase">Customers</span>
									<span class="caption-helper">manage customers...</span>
								</div>
								<div class="actions">
									<div class="btn-group">
										<a class="btn btn-default btn-circle" href="javascript:;" data-toggle="dropdown">
										<i class="fa fa-share"></i> Tools <i class="fa fa-angle-down"></i>
										</a>
										<ul class="dropdown-menu pull-right">
											<li>
												<a href="javascript:;">
												Export to Excel </a>
											</li>
											<li>
												<a href="javascript:;">
												Export to CSV </a>
											</li>
											<li>
												<a href="javascript:;">
												Export to XML </a>
											</li>
											<li class="divider">
											</li>
											<li>
												<a href="javascript:;">
												Print Invoices </a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="portlet-body">
								<div class="table-container">
									
									<table class="table table-striped table-bordered table-hover" id="datatable_products">
										<thead>
										<tr class="bg-info">
												<th>Sl.</th>
												<th>Name</th>
												<th>Company Name</th>
												<th>Business Location</th>
												<th>Group</th>
												<th>Status</th>
										</tr>		
										</thead>
										<tbody>
										@foreach($customers as $customer)
											<tr>
												<td></td>
												<td>{{ $customer->firstname }}{{ $customer->lastname }}</td>
												<td>{{ $customer->company->compamy_name->name or ''}}</td>
												
												<td>{{ $customer->busines_location}}</td>
												<td>{{ $customer->bdtdcCustomerGroup->name}}</td>
												@if(($customer->status)=='1')
												<td>Active</td>
												@else
												<td>Not Active</td>
												@endif
											</tr>
										@endforeach


										

										</tbody>
									</table>

									{!! $users->render() !!}
								</div>
							</div>
						</div>
						<!-- End: life time stats -->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
			</div>
		</div>
		<!-- END CONTENT -->
		<!-- BEGIN QUICK SIDEBAR -->
		<!--Cooming Soon...-->
		<!-- END QUICK SIDEBAR -->

@stop
@section('script')
<script>
        jQuery(document).ready(function() {    
           Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
           EcommerceProducts.init();
        });
    </script>
    @stop
