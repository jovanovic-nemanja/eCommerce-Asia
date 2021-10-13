@extends('fontend.master2')
@section('content')
<div style="clear:both"></div>
<div id="item_sha" class="row">
   <div class="form-group">

      <h4><b>Send your message to this supplier</b></h4>
      <div class="form-group">
         <label for="To">To:</label>
         Jean Sk
      </div>
      <div class="form-group">
         <label for="message">Message:</label>
         <textarea class="form-control" rows="5" id="message"></textarea>
         <p>Your message must be between 20-8000 characters</p>
      </div>
      <div class="form-group">
         Please enter the content
         <div class="col-md-6">
            <label for="usr">Quantity:</label>
            <input type="text" class="form-control" id="quantity">
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <label for="sel1">Select list:</label>
               <select class="form-control" id="sel1">
                  <option>piece/pieces</option>
                  <option>meter/meters</option>
                  <option>mile/miles</option>
                  <option>pair/pairs</option>
               </select>
            </div </div> </div> <div class="col-sm-12">
            <div class="checkbox">
               <label><input type="checkbox" value="">Recommend matching suppliers if this supplier doesn’t contact me on Message Center within 24 hours.</label>
            </div>

            <div class="checkbox">
               <label><input type="checkbox" value="">I agree to share my Business Card to the supplier</label>
            </div>
         </div>

         <button type="submit" class="btn btn-warning">send</button>
      </div>
   </div>
@stop
				
@section('scripts')

<script type="text/javascript">
	jQuery(document).ready(function($) {

	   $('#etalage').etalage({
	      thumb_image_width: 300,
	      thumb_image_height: 400,

	      show_hint: true,
	      click_callback: function(image_anchor, instance_id) {
	         alert('Callback example:\nYou clicked on an image with the anchor: "' + image_anchor + '"\n(in Etalage instance: "' + instance_id + '")');
	      }
	   });
	   // This is for the dropdown list example:
	   $('.dropdownlist').change(function() {
	      etalage_show($(this).find('option:selected').attr('class'));
	   });

	});

	$(function() {
	   /**
	    * the element
	    */
	   var $ui = $('#ui_element');

	   /**
	    * on focus and on click display the dropdown, 
	    * and change the arrow image
	    */
	   $ui.find('.sb_input').bind('focus click', function() {
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
	   $ui.bind('mouseleave', function() {
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
	   $ui.find('.sb_dropdown').find('label[for="all"]').prev().bind('click', function() {
	      $(this).parent().siblings().find(':checkbox').attr('checked', this.checked).attr('disabled', this.checked);
	   });
	});
</script>	
@stop