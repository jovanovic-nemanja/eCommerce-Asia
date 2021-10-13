@extends('fontend.master_dynamic')
	@section('page_css')
	<link property='stylesheet' href="{!! asset('css/about-page.css') !!}" rel="stylesheet">
	<link property='stylesheet' href="{!! asset('assets/fontend/bdtdccss/bdtdc-sme-center-style.css') !!}" rel="stylesheet">
	@endsection
	@section('content')
<style type="text/css">
	.error-template {padding: 40px 15px;text-align: center;}
</style>
	<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
        	<div class="col-md-3"></div>
        	<div class="col-md-6">
        		<div class="error-template card">
                <h1><strong>We're working on it!</strong></h1>
                <h3>We are working hard to make this page and will fix it very soon. We apologize for any inconvenience. Please explore other pages to learn more about BuyerSeller.</h3>
                <!-- <div class="error-details">
                    Sorry, an error has occured, Requested page not found!
                </div> -->
                <div class="error-actions">
                    <a href="{{url('/')}}" class="btn btn-primary btn-lg">Go Home </a>
                </div>
            </div>
        	</div>
        	<div class="col-md-3"></div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<script type="text/javascript">

</script>
@stop