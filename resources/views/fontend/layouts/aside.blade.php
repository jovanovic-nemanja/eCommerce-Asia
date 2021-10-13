<div id="item_sha" class="row">
				 <div class="col-sm-4 col-md-3 col-xs-12">
					        <div class="col-sm-12 col-xs-12 mobo-categories hr-gap no-padding">
            <h3><a href="#"><i class="fa fa-list-ul"></i> CATEGORIES</a></h3>
            <?php if ($categorys) { ?>
            <?php foreach ($categorys as $category) { ?>
            
            <ul id="bazar-list" class="pull-left">
                <li class="" data-id="market-<?php echo $category['category_id']; ?>">
                    <a href="{{ URL::route('category.product',$category['category_id']) }}">
                        <?php echo $category[ 'name']; ?> </a>
                    <span class="pull-right"><i class="fa fa-angle-right"></i></span>
                </li>
            </ul>
            
            <?php if ($category[ 'category_childrens']) { ?>
            <?php foreach (array_chunk($category[ 'category_childrens'], ceil(count($category[ 'category_childrens']))) as $category_childrens) { ?>
            <div class="col-lg-offset-12 col-md-offset-12 col-sm-offset-12 cacostos util-clearfix" id="market-<?php echo $category['category_id']; ?>">
                <ul class="cacostos-list">
                    <li>
                        <a href="#" class="prothom-cacostos"><a href="{{ URL::route('category.product',$category['category_id']) }}">
                        <?php echo $category[ 'name']; ?> </a></a>
                        <div class="ditio-cacostos">
                            <?php foreach (array_slice($category_childrens,0,11) as $category_children) { ?>

                            <a href="{{URL::to('category/product',$category_children['categories_id']) }}">
                                <?php echo $category_children[ 'child_name']; ?>
                            </a>
                            <?php } ?>
                        </div>
                    </li>

                </ul>
                 <ul class="cacostos-list">
                    <li>
                        <a href="#" class="prothom-cacostos"></a>
                        <div class="ditio-cacostos">
                            <?php foreach (array_slice($category_childrens,12,22) as $category_children) { ?>

                            <a href="{{URL::to('category/product',$category_children['categories_id']) }}">
                                <?php echo $category_children[ 'child_name']; ?>
                            </a>
                            <?php } ?>

                        </div>
                    </li>

                </ul>
            </div>
            <?php } ?>
            <?php } ?>
            <?php } ?>
            <?php } ?>

        </div>
<!--/brands_products-->
<br><br><br>
						<div class="price-range"><!--price-range-->
							<h2>Price Range</h2>
							<div class="well text-center">
								 <div class="slider slider-horizontal" style="width: 185px;"><div class="slider-track"><div class="slider-selection" style="left: 41.6667%; width: 33.3333%;"></div><div class="slider-handle round left-round" style="left: 41.6667%;"></div><div class="slider-handle round" style="left: 75%;"></div></div><div class="tooltip top" style="top: -30px; left: 74.4167px;"><div class="tooltip-arrow"></div><div class="tooltip-inner">250 : 450</div></div><input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"></div><br>
								 <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
							</div>
						</div><!--/price-range-->

						<div class="shipping text-center"><!--shipping-->
							<img src="http://localhost/bdtdc.com/resources/assets/dashboard/images/home/shipping.jpg" alt="">
						</div><!--/shipping-->

					</div>
