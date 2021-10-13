@extends('fontend.master-dashboard')
@section('page_css')
    <link property='stylesheet' href="{!! asset('css/dashboard.css') !!}" rel="stylesheet">
    <link property='stylesheet' href="{!! asset('assets/fontend/bdtdccss/why-bdtdc.css') !!}" rel="stylesheet">

  @endsection
@section('content')
<div class="container">
	<div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                    <ul class="top-path" style="padding-bottom: 8px;">
                        <li class="top-path-li"><a href="{{URL::to('/',null)}}" class="top-path-li-a">Home <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        <li class="top-path-li"><a href="{{URL::to('company/dashboard',null)}}" class="top-path-li-a"> Dashboard <i class="fa fa-angle-right top-path-icon"></i></a></li>

                        <li class="top-path-li"><a href="" class="top-path-li-a"> Manage Product Goups <i class="fa fa-angle-right top-path-icon"></i></a></li>
                        
                        
                    </ul>
            </div>
    
  </div>
<div class="row padding_0;" style="background:#fff; margin-top:8px;border-top: 1px solid #d1dbe8;margin-bottom:20px;">
		<div class="col-sm-12 col-md-12 col-lg-12 padding_0">
				<div class="col-sm-2 col-md-2 col-lg-2 padding_0">
				@include('fontend.layouts.dashboard-aside')
	
					</div>
					<div class="col-sm-10 col-md-10">
								<div class="page-wrapper">
											<h1 class="h1-guide" id="guide">Manage and Sort Groups</h1>
											<div class="dpl-board-notice" id="groupInfo" style="display: block;">
												Total Groups: <span class="alert-a" id="groupCount">{{$count}}</span>
												<!-- Grouped Product(s): <span class="alert-a" id="groupProductCount">0</span>,
												Ungrouped Product(s): <span class="alert-a" id="ungroupProductCount">2</span> -->
											    <div id="dataChangeNotice">Your recent changes will be shown in your Company Website within 24 hours. ( We just display online products here.  )</div>
											</div>

									  		 <div class="Group-pro-ad-edit" style="margin-top: 2%;">
								    		<div id="manage-1" style="padding-top: 15px; border-top: 1px solid #ddd">
								    			<form action="{{URL::to('product/manage_product_group',null)}}" method="post" enctype="multipart/form-data">
							    				{!! csrf_field() !!}
							    				<p><span style="margin-right: 5px">Add Group:</span><input type="text" name="name" placeholder="name" style="padding-left: 5px;border: 1px solid #DDD;" required>
							    				<span style="margin-right: 5px">Add Image:</span><input type='file' name='image' style="border:1px solid #DDD;display: inline-block;" required>
							    				<input id="btnSaveGroupOrder" type="submit" class="dpl-btn-gray-smaller dpl-font-black" value="Add Group" style="border: 1px solid #DDD;">

							    				</p>
												</form>
																<div class="" id="" style="">
													<p style="font-size:11px;border-bottom:1px solid #DDD;">Group Name(Number Of Products)</p>
													<div class="table-responsive">
													<table class="table table-striped table-bordered table-hover" id="sample_1">
														<thead>
														<tr class="" style="border:1px solid #DDD;border-bottom:1px solid #DDD;">
															<th class="" >Image</th>
															<th class="" >Name</th>
															<th class="" >Show Banner</th>
															<th class="" >Sort</th>
															<th class="" >Active</th>
															<th class="" >Edit</th>
														</tr>
													</thead>
														@foreach($group as $g)
														<tr class="" style="border-bottom:1px solid #DDD;">
															<td class="" style="">
															@if($g->image)
																<img style="height:42px;width:52px;" src="{{ URL::to('banner-images',$g->image) }}" alt="" />
																@else
																<img style="height:42px;width:52px;" src="{{ asset('assets/default-image_450.jpg') }}" alt="" />

															@endif
															</td>
															<td class="" style="">
																{{$g->name}}
															</td>
															<td>{{$g->show_banner?'Yes':'No'}}</td>
															<td>{{$g->sort}}</td>
															<td>{{$g->active==1?'Yes':'No'}}</td>
															<td class="" style="">
																<a title="Update" href="{{ URL::to('product/manage_product_group_edit',$g->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true" style="font-size: 19px; color: #002858; margin-left: 4px; margin-top: 8px;"></i></a>
															
															</td>
														</tr>
														@endforeach
													</table>
													</div>
												</div>


									    			</div>
									    			
									    			
									    			
									    	</div>
								</div>
					</div>
		</div>
</div>
@stop
 @section('scripts')

 @include('fontend.layouts.dashboard_aside_scripts')

        <script type="text/javascript">
        function add_group() {
		   document.getElementById('add-pro').style.display = "block";
		}
		function hide_in_field(){
		   document.getElementById('add-pro').style.display = "none";
		}
		function change_group(){
		   document.getElementById('select_group_select_group_instance').style.display = "block";
		}
		function close_group(){
		   document.getElementById('select_group_select_group_instance').style.display = "none";
		}
		$(document).ready(function(){
		    //   $("#Manage-pro").click(function(e){
		    //   	e.preventDefault();
		    //   	$("#manage-1").hide();
		    //     $("#manage-2").show();
		    // });
		//       $("#manage-grp").click(function(e){
		//       	e.preventDefault();
		//       	 $("#manage-1").show();
		//         $("#manage-2").hide();
		//     });
		// });

		$(document).ready(function() {
    var max_fields      = 20;
    var wrapper         = $(".input_fields_wrap"); 
    var add_button      = $(".add_field_button"); 
    
    var x = 1; 
    $(add_button).click(function(e){ 
        e.preventDefault();
        if(x < max_fields){ 
            x++; 
            $(wrapper).append('<div><input type="text" name="mytext[]"/><a href="#" class="remove_field">Remove</a></div>'); 
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ 
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
		
// 		function manage_product(){
// 		    document.getElementById('manage-2').style.display = "block";
// 		}
		// function manage_group(){
		// 	document.getElementById('manage-2').style.display = "none";
		//    document.getElementById('manage-1').style.display = "block";

		// }
		
 </script>
					
   @stop