<div class="row">
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
