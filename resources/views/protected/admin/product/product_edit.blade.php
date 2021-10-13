@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="col-xs-12">
        @if (session()->has('flash_message'))
            <p>{{ session()->get('flash_message') }}</p>
        @endif
    </div>

    <h3 class="page-title">
        Product Create <small>create & edit product</small>
    </h3>
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <i class="fa fa-home"></i>
                <a href="index.html">Home</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">eCommerce</a>
                <i class="fa fa-angle-right"></i>
            </li>
            <li>
                <a href="#">Product Add</a>
            </li>
        </ul>
        <div class="page-toolbar">
            <div class="btn-group pull-right">
                <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
                    Actions <i class="fa fa-angle-down"></i>
                </button>
                <ul class="dropdown-menu pull-right" role="menu">
                    <li>
                        <a href="#">Action</a>
                    </li>
                    <li>
                        <a href="#">Another action</a>
                    </li>
                    <li>
                        <a href="#">Something else here</a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                        <a href="#">Separated link</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <input type="hidden" name="hidden_payment_tearms" value="{{ $products[0]->payment_method }}">
            {!! Form::open(array('route'=>array('admin.product-update', $products[0]->id),'id'=>'form1','class'=>'form-horizontal  form-row-seperated','files'=>true)) !!}
            <input type="hidden" name="hidden_categorie" value="{{$products[0]->category->category_id }}">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-basket font-green-sharp"></i>
										<span class="caption-subject font-green-sharp bold uppercase">
										Add Product </span>
                        <span class="caption-helper">Man Tops</span>
                    </div>
                    <div class="actions btn-set">
                        <button type="button" name="back" class="btn btn-default btn-circle"><i class="fa fa-angle-left"></i> Back</button>
                        <button class="btn btn-default btn-circle "><i class="fa fa-reply"></i> Reset</button>
                        <button class="btn green-haze btn-circle"><i class="fa fa-check"></i> Save</button>
                        <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button>
                        <div class="btn-group">
                            <a class="btn yellow btn-circle" href="javascript:;" data-toggle="dropdown">
                                <i class="fa fa-share"></i> More <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li>
                                    <a href="javascript:;">
                                        Duplicate </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        Delete </a>
                                </li>
                                <li class="divider">
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        Print </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="portlet-body">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_general" data-toggle="tab">
                                    General </a>
                            </li>
                            <li>
                                <a href="#tab_images" data-toggle="tab">
                                    Images </a>
                            </li>
                        </ul>
                        <div class="tab-content no-space">
                            <div class="tab-pane active" id="tab_general">
                                <div class="page-bar">
                                    <ul class="page-breadcrumb">
                                        <li>
                                            <b>General Information:</b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Product Name: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            {!! Form::text('product_name', $products[0]->product_name['name'], ['class' => 'form-control'])  !!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Parent Category: <span class="required">
                                                        * </span>
                                        </label>
                                        <div class="col-md-5">
                                            <div class="form-control height-auto parent_id_div">
                                                <div class="scroller" style="height:275px;" data-always-visible="1">

                                                    <ul class="list-unstyled">
                                                        <?php if ($categorys) {?>

                                                        <label><input type="checkbox" class="parent_id" name="categories[]" value="0">Parent</label>
                                                        <?php foreach ($categorys as $category) {?>


                                                        <li>
                                                            <label><input type="checkbox" class="parent_id" name="categories[]"  value="<?php echo $category['category_id']; ?>">
                                                                <?php echo $category['name']; ?></label>

                                                            <?php if ($category['category_childrens']) { ?>
                                                            <?php foreach (array_chunk($category['category_childrens'], ceil(count($category['category_childrens']))) as $category_childrens) { ?>
                                                            <ul class="list-unstyled">
                                                                <?php foreach ($category_childrens as $category_children) { ?>
                                                                <li>
                                                                    <label><input type="checkbox" class="chield_id" name="categories[]" value="<?php echo $category_children['category_id']; ?>"> <?php echo $category_children['child_name']; ?></label>
                                                                </li>
                                                                <?php } ?>
                                                            </ul>
                                                            <?php } ?>
                                                            <?php } ?>

                                                        </li>
                                                        <?php } ?>
                                                        <?php } ?>

                                                    </ul>
                                                </div>
                                            </div>
                                                            <span class="help-block">
                                                            select only one category </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Description: <span class="required">
														* </span>
                                        </label>
                                        <div class="col-md-10">
                                            <textarea class="form-control" name="product_description">{{ $products[0]->product_name['description']  }}</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Meta Title:</label>

                                        <div class="col-md-10">
                                            {!! Form::text('product_meta_title', $products[0]->product_name['meta_title'], ['class' => 'form-control'])  !!}
                                            <span class="help-block">
															max 100 chars </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Meta Keywords:</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler"  name="product_meta_keywords" maxlength="1000">{{ $products[0]->product_name['meta_keyword'] }}</textarea>
															<span class="help-block">
															max 1000 chars </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Meta Description:</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler" rows="4" name="product_meta_description" maxlength="255">{{ $products[0]->product_name['meta_description'] }}</textarea>
															<span class="help-block">
															max 255 chars </span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Product tags:</label>
                                        <div class="col-md-10">
                                            <textarea class="form-control maxlength-handler"  name="product_tags" maxlength="255">{{ $products[0]->product_name['tag'] }}</textarea>
															<span class="help-block">
															max 255 chars </span>
                                        </div>
                                    </div>

                                </div>

                                <div class="page-bar">
                                    <ul class="page-breadcrumb">
                                        <li>
                                            <b>Product Details:</b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Model: <span class="required">
														* </span>
                                        </label>

                                        <div class="col-md-10">
                                            {!! Form::text('product_model', $products[0]->model, ['class' => 'form-control'])  !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label">Brand Name:</label>
                                        <div class="col-md-10">
                                            {!! Form::text('brand_name',$products[0]->brandname,['class'=>'form-control','placeholder'=>'Brand Name','style'=>'width:38%']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-2" align='right'>
                                            {!! Form::label( 'Country', '',array('id'=>'label_country')) !!}
                                            <span class="required"> * </span>
                                        </div>
                                        <div class="col-md-8">


                                            {!! Form::select('country',$country,'',array('class'=>'form-control','id'=>'country','placeholder'=>'select...')) !!}

                                        </div>
                                    </div>
                                </div>


                                <div class="page-bar">
                                    <ul class="page-breadcrumb">
                                        <li>
                                            <b>Attributes:</b>
                                        </li>
                                    </ul>
                                </div>
                                @foreach($attributes as $attr)
                                <div class="form-group attribute_area">
                                    <input name="attr_id[]" type="hidden" value="{{ $attr->bdtdcAttribute->id }}">
                                    <label class="col-md-2 control-label">Attributes: <span class="required">
														* </span>
                                    </label>

                                        <label class="col-md-1 control-label">Name:</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="product_att_name[]" value="{{ $attr->bdtdcAttribute->name or '' }}" placeholder="">
                                        </div>
                                        <label class="col-md-1 control-label">Value:</label>
                                        <div class="col-md-2">
                                            <input type="text" class="form-control" name="product_att_value[]" value="{{ $attr->bdtdcAttribute->value or ''  }}" placeholder="">
                                        </div>

                                        <button class="btn green-haze btn-circle add_more_attribute_btn"><i class="fa fa-plus"></i> Add More</button>

                                </div>
                                @endforeach
                                <div class="copied_template">

                                </div>



                                <div class="page-bar">
                                    <ul class="page-breadcrumb">
                                        <li>
                                            <b>Trade:</b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Trade Details: <span class="required">
														* </span>
                                    </label>
                                    <label class="col-md-2 control-label">Unit Type:</label>
                                    <div class="col-md-2">
                                        <select class="form-control" name="unit_type" id="sel1">
                                            @foreach($units as $u)
                                                <option value={!! $u->id !!}>{!! $u->name !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label class="col-md-2 control-label">Price:</label>
                                    <div class="col-md-2">
                                        <input type="text" class="form-control" name="product_price" value="{{ $products[0]->price }}" placeholder="">
                                    </div>
                                </div>



                                <div class="page-bar">
                                    <ul class="page-breadcrumb">
                                        <li>
                                            <b>Payment Terms:</b>
                                        </li>
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Options: <span class="required">
														* </span>
                                    </label>
                                    <div class="col-md-7">
                                        <div class="form-control height-auto">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <label><input type="checkbox" name="payment[]" value="Bkash">Bkash</label>
                                                    <label><input type="checkbox" name="payment[]" value="Paypal">Paypal</label>
                                                    <label><input type="checkbox" name="payment[]" value="DBBL">DBBL</label>
                                                    <label><input type="checkbox" name="payment[]" value="Western Union">Western Union</label>
                                                </li>
                                            </ul>

                                        </div>
															<span class="help-block">
															select one or more options </span>
                                    </div>
                                </div>
                            </div>


                            <div class="tab-pane" id="tab_images">

                                <div class="panel panel-success">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Operations</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                        <div class="row fileupload-buttonbar">
                                            <div class="col-xs-5">
                                                <h4>Image</h4>
                                                <img class="img-thumbnail" style="width:58%;height: 108px;margin-bottom: 2%;" src="{{ URL::to('uploads',$products[0]->image) }}" alt="">

                                            </div>
                                            <div class="col-lg-12">
                                                <!-- The fileinput-button span is used to style the file input field as button -->
                                                            <span class="btn green fileinput-button">
                                                            <i class="fa fa-plus"></i>
                                                            <span>
                                                            Add file... </span>
                                                            <input type="file" name="image" multiple="">
                                                            </span>
                                                <button type="submit" class="btn blue start">
                                                    <i class="fa fa-upload"></i>
                                                            <span>
                                                            Start upload </span>
                                                </button>



                                                <!-- The global file processing state -->
                                                            <span class="fileupload-process">
                                                            </span>
                                            </div>


                                        </div>
                                        <!-- The table listing the files available for upload/download -->

                                    </div>
                                </div>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr role="row" class="heading">
                                        <th width="8%">
                                            Image
                                        </th>
                                        <th width="25%">
                                            Label
                                        </th>
                                        <th width="8%">
                                            Sort Order
                                        </th>
                                        <th width="10%">
                                            Base Image
                                        </th>
                                        <th width="10%">
                                            Small Image
                                        </th>
                                        <th width="10%">
                                            Thumbnail
                                        </th>
                                        <th width="10%">
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <a href="../../assets/admin/pages/media/works/img1.jpg" class="fancybox-button" data-rel="fancybox-button">
                                                <img class="img-responsive" src="../../assets/admin/pages/media/works/img1.jpg" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="product[images][1][label]" value="Thumbnail image">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="product[images][1][sort_order]" value="1">
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="product[images][1][image_type]" value="1">
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="product[images][1][image_type]" value="2">
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="product[images][1][image_type]" value="3" checked>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn default btn-sm">
                                                <i class="fa fa-times"></i> Remove </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="../../assets/admin/pages/media/works/img2.jpg" class="fancybox-button" data-rel="fancybox-button">
                                                <img class="img-responsive" src="../../assets/admin/pages/media/works/img2.jpg" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="product[images][2][label]" value="Product image #1">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="product[images][2][sort_order]" value="1">
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="product[images][2][image_type]" value="1">
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="product[images][2][image_type]" value="2" checked>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="product[images][2][image_type]" value="3">
                                            </label>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn default btn-sm">
                                                <i class="fa fa-times"></i> Remove </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="../../assets/admin/pages/media/works/img3.jpg" class="fancybox-button" data-rel="fancybox-button">
                                                <img class="img-responsive" src="../../assets/admin/pages/media/works/img3.jpg" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="product[images][3][label]" value="Product image #2">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="product[images][3][sort_order]" value="1">
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="product[images][3][image_type]" value="1" checked>
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="product[images][3][image_type]" value="2">
                                            </label>
                                        </td>
                                        <td>
                                            <label>
                                                <input type="radio" name="product[images][3][image_type]" value="3">
                                            </label>
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn default btn-sm">
                                                <i class="fa fa-times"></i> Remove </a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    </div>

    <!-- END PAGE CONTENT-->

@stop
@section('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function() {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
            EcommerceProductsEdit.init();
        });


        (function(){

            var cat_id,cat_arr,parent_cat,chield_cat;
            cat_id = $('[name="hidden_categorie"]').val();
            cat_arr = cat_id.split(",");
            parent_cat = cat_arr[0];
            for(i=1;i<cat_arr.length;i++){
                $("input[type='checkbox'][value='"+parent_cat+"']").prop('checked', true);
                $(".chield_id[type='checkbox'][value='"+cat_arr[i]+"']").prop('checked', true);
            }

            var method = $('[name="hidden_payment_tearms"]').val();
            method_arr = method.split(",");
            for(i=0;i<method_arr.length;i++){
                $('[name="payment[]"][value="'+method_arr[i]+'"]').prop('checked', true);
            }

            $(document).on({click:function(e){
                var target_area,data_template,prev_name,prev_value;
                e.preventDefault();
                prev_name = $(this).parent().find('[name="product_att_name[]"]').val();
                prev_value = $(this).parent().find('[name="product_att_value[]"]').val();

                data_template = '<div class="form-group attribute_area"><label class="col-md-2 control-label">Attributes: <span class="required">\
														* </span>\
													</label>\
													<label class="col-md-1 control-label">Name:</label>\
													<div class="col-md-2">\
														<input type="text" placeholder="" name="product_att_name[]" value="" class="form-control">\
													</div>\
													<label class="col-md-1 control-label">Value:</label>\
													<div class="col-md-2">\
														<input type="text" placeholder="" name="product_att_value[]" value="" class="form-control">\
													</div>\
														<button class="btn green-haze btn-circle  add_more_attribute_btn"><i class="fa fa-plus"></i> Add More</button><a class="remove_attributes"><i class="fa fa-minus btn btn-danger btn-sm"></i></a></div>';




                (prev_name.length>0 && prev_value.length>0)?$('.copied_template').append(data_template) : false;


            }},'.add_more_attribute_btn');

            $(document).on({click:function(e){

                e.preventDefault();
                $(this).closest('.attribute_area').remove();

            }},'.remove_attributes')


        })()

    </script>

    <!-- END JAVASCRIPTS -->
@stop
