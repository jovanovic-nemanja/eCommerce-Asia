@extends('fontend.master3')
@section('content')
		<div class="row">
  			<div class="col-sm-12 col-md-12 col-lg-12">
  					<ul class="top-path">
  						<li class="top-path-li"><a href="{{URL::to('/',null)}}" class="top-path-li-a">Home <i class="fa fa-angle-right top-path-icon"></i></a></li>
  						<li class="top-path-li"><a href="{{URL::to('SupplierChannel/pages/learning_center',33)}}" class="top-path-li-a">Learning<i class="fa fa-angle-right top-path-icon"></i></a></li>
  						
  					</ul>
  			</div>
  	
  </div>
@stop