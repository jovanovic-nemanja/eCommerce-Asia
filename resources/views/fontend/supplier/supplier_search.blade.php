@extends('fontend.master3')
@section('content')

<br>
@if ($categorys)
<div class="category-tab">
   <table class="table" style="width:100%">
      @foreach ($categorys as $category)
      <div class="col-sm-3" border="1">
         <a href="#tab-<?php echo $category['category_id']; ?>" data-toggle="tab">
            <i class="fa fa-shopping-cart"></i><?php echo $category['name']; ?>
         </a><br>
      </div>
      @endforeach
   </table>

   <div class="tab-content">
      @foreach ($categorys as $category)
      <div class="tab-pane fade active in" id="tab-<?php echo $category['category_id']; ?>">
         <h4>{{ $category['name'] }}</h4>
         @if($category['category_childrens'])
         @foreach (array_chunk($category['category_childrens'], ceil(count($category['category_childrens']))) as $category_childrens)
         <ul>
            <li>
               @foreach ($category_childrens as $category_children)
               <a href="{{URL::to('category/product',$category_children['category_id'])}}">
                  {{ $category_children['child_name'] }}
               </a>
               @endforeach
            </li>
         </ul>
         @endforeach
         @endif
      </div>
      @endforeach
   </div>
</div>
@endif
<br>
@stop
@section('scripts')
<script type="text/javascript">
	$(document).on({
	   click: function() {
	      if ($(this).val() == "app") {
	         $('.business_type_row,.main_product_row').hide()
	      } else {
	         $('.business_type_row,.main_product_row').show()
	      }
	   }
	}, '.customer_type');
</script>
@stop