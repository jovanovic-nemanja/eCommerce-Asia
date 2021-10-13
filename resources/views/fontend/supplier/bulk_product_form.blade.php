@extends('fontend.master_dynamic')
@section('content')
<div class="container">
   <div class="row">
      <h2>Manage Junk Product</h2>
      <form class="form-inline" role="form">
         <div class="form-group">
            <label for="product_id">Product Id:</label>
            <input type="text" class="form-control" id="product_id">
         </div>
         <button type="submit" class="btn btn-default delete_product">Delete</button>
      </form><br>
      <div><button type="button" class="btn btn-default delete_junk_product">Delete all junk products</button></div><br>
      <div><button type="button" class="btn btn-default delete_all_images">Delete all junk images</button></div>
   </div>
</div>
@stop
@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {

	   $(document).on({
	      keyup: function(event) {
	         // Allow: backspace, delete, tab, escape, and enter
	         if (event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
	            // Allow: Ctrl+V
	            (event.ctrlKey == true && (event.which == '118' || event.which == '86')) ||
	            // Allow: Ctrl+c
	            (event.ctrlKey == true && (event.which == '99' || event.which == '67')) ||
	            // Allow: Ctrl+A
	            (event.keyCode == 65 && event.ctrlKey === true) ||
	            // Allow: home, end, left, right
	            (event.keyCode >= 35 && event.keyCode <= 39)) {
	            // let it happen, don't do anything
	            return;
	         }
	         var o = $(this);
	         o.val(o.val().replace(/[^\d]/g, ""));
	         if (o.val().length > o.maxLength) {
	            o.val(o.value.slice(0, o.maxLength))
	         }
	      }
	   }, '.check_integer');

	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         var product_id = $.trim($('#product_id').val());
	         if (product_id == '') {
	            alert('product id is required');
	         } else {
	            if (isNaN(product_id)) {
	               alert("product id is not a number");
	            } else {
	               alert("number");
	            }
	         }

	      }
	   }, '.delete_product');

	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         alert(5);
	      }
	   }, '.delete_junk_product');

	   $(document).on({
	      click: function(e) {
	         e.preventDefault();
	         alert(6);
	      }
	   }, '.delete_all_images');
	});
</script>
@stop