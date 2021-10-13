@extends('fontend.master3')
	@section('content')

					<div class="category-tab">
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#answer" data-toggle="tab">Answer</a></li>
								<li><a href="#service" data-toggle="tab">Service</a></li>
								<li><a href="#contact" data-toggle="tab">Contact</a></li>
								
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="answer">
								
							<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Help Center</h2>
						<div class="panel-group category-products" id="accordian">
				<?php if ($categorys) { ?>
                     <?php foreach ($categorys as $category) { ?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="#market-<?php echo $category['category_id']; ?>">
											<span class="badge pull-right"><i class="fa fa-plus"></i></span>
											<a href="{{ URL::route('category.product',$category['category_id']) }}"><?php echo $category['name']; ?> </a>
										</a>
									</h4>
								</div>
								<?php if ($category['category_childrens']) { ?>
                         			<?php foreach (array_chunk($category['category_childrens'], ceil(count($category['category_childrens']))) as $category_childrens) { ?>
								<div id="market-<?php echo $category['category_id']; ?>" class="panel-collapse collapse">
									<div class="panel-body">
										<ul>
										<?php foreach ($category_childrens as $category_children) { ?>
											<li> <a href="{{URL::route('category.product',$category_children['category_id']) }}"><?php echo $category_children['child_name']; ?></a></li>
										<?php } ?>
										</ul>
									</div>
								</div>
								<?php } ?>
								<?php } ?>

							</div>
							<?php } ?>
								<?php } ?>

						</div>

							
						</div>
						<!--/brands_products-->


					</div>
							<div class="col-sm-9 padding-right">


					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Features Items</h2>

		

						
					</div><!--features_items-->

				

					<!--/category-tab-->
					<br><br>
					

					<!-- Bootstrap trigger to open modal --> 
 
 

					
				</div>
								
							</div>
							
							<div class="tab-pane fade" id="service">
							
								
								Service
							</div>
							
							<div class="tab-pane fade" id="contact">
								
								
								
								Contact
							</div>
							
							
						</div>
					



@stop
@section('script')
<script type="text/javascript">
            $(function() {
				/**
				* the element
				*/
				var $ui 		= $('#ui_element');
				
				/**
				* on focus and on click display the dropdown, 
				* and change the arrow image
				*/
				$ui.find('.sb_input').bind('focus click',function(){
					$ui.find('.sb_down')
					   .addClass('sb_up')
					   .removeClass('sb_down')
					   .andSelf()
					   .find('.sb_dropdown')
					   .show();
				});
				
				/**
				* on mouse leave hide the dropdown, 
				* and change the arrow image
				*/
				$ui.bind('mouseleave',function(){
					$ui.find('.sb_up')
					   .addClass('sb_down')
					   .removeClass('sb_up')
					   .andSelf()
					   .find('.sb_dropdown')
					   .hide();
				});
				
				/**
				* selecting all checkboxes
				*/
				$ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click',function(){
					$(this).parent().siblings().find(':checkbox').attr('checked',this.checked).attr('disabled',this.checked);
				});
            });
        </script>	
@stop