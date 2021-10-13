@extends('protected.admin.master')

@section('title', 'Admin Dashboard')

@section('content')
<div class="col-xs-12">
   @if (session()->has('flash_message'))
   <p>{{ session()->get('flash_message') }}</p>
   @endif
</div>
<style>
   #selectedFiles img, embed {
      max-width: 100px;
      max-height: 100px;
      float: left;
      margin-bottom:10px;
   }
   .close {
      float:left;
      display:inline-block;
      padding:2px 5px;
      background:#ccc;
   }
   .close:hover {
      float:left;
      display:inline-block;
      padding:2px 5px;
      background:#ccc;
      color:#fff;
   }
</style>

<h3 class="page-title">
   Notice Update
</h3>
<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <i class="fa fa-home"></i>
         <a href="{{URL::route('admin_dashboard')}}">Home</a>
         <i class="fa fa-angle-right"></i>
      </li>

      <li>
         <a href="#">Notice Update</a>
      </li>
   </ul>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
   <div class="col-md-12">
      <form action="{{ URL::to('admin/noticeUpdate', $notice->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal form-row-seperated" accept-charset="UTF-8">
         @csrf
      <div class="portlet light">
         <div class="portlet-title">
            <div class="caption">
               <i class="icon-basket font-green-sharp"></i>
               <span class="caption-subject font-green-sharp bold uppercase">
                  Update Notice </span>
            </div>
            <div class="actions btn-set">
               <button class="btn green-haze btn-circle" type="submit"><i class="fa fa-check"></i> Update </button>
               <!-- <button class="btn green-haze btn-circle"><i class="fa fa-check-circle"></i> Save & Continue Edit</button> -->
            </div>
         </div>
         @if (count($errors) > 0)
         <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
            </ul>
         </div>
         @endif
         <div class="portlet-body">
            <div class="form-body">
               <div class="form-group">
                  <label class="col-md-2 control-label">Notice Type: <span class="required">
                     * </span>
                  </label>
                  <div class="col-md-10">
                     <select class="form-control notice_type" name="notice_type" id="notice_type" required>
                        <option value="">Please Select</option>
                        <option value="1" @if($notice->notice_type == 1) selected @endif >General</option>
                        <option value="2" @if($notice->notice_type == 2) selected @endif >User Role</option>
                        <option value="3" @if($notice->notice_type == 3) selected @endif >User</option>
                     </select>
                  </div>
               </div>
               <input type="hidden" name="notice_id" value="{{$notice->id}}">
               <div id="selected_list" class="com-md-10 col-md-offset-2">
                  @if($notice->notice_type == 2)
                     @foreach($notice->notice_details as $rowdata)
                     <div class="col-md-3"><input type="hidden" name="user_role_id[]" value="{{$rowdata->get_user_role_info->id}}"><p>{{$rowdata->get_user_role_info->name}} &nbsp;<span class="btn btn-danger btn-xs btn-circle" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;">x</span></p></div>
                     @endforeach
                  @elseif($notice->notice_type == 3)
                     @foreach($notice->notice_details as $rowdata)
                     <div class="col-md-3"><input type="hidden" name="user_id[]" value="{{$rowdata->get_user_info->id}}"><p>{{$rowdata->get_user_info->first_name}} {{$rowdata->get_user_info->last_name}} &nbsp;<span class="btn btn-danger btn-xs btn-circle" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;">x</span></p></div>
                     @endforeach
                  @endif
               </div>
               <div class="clearfix"></div>
               <div class="form-group user-role-div @if($notice->notice_type != 2) hidden @endif">
                  <label class="col-md-2 control-label">User Role: <span class="required">
                     * </span>
                  </label>
                  <div class="col-md-10">
                     <select class="form-control" name="user_role" id="user_role">
                        <option value="">Please Select</option>
                        @foreach ($roles as $rowdata)
                        <option value="{{$rowdata->id}}" value2="{{$rowdata->name}}">{{$rowdata->name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group user-div @if($notice->notice_type != 3) hidden @endif">
                  <label class="col-md-2 control-label">User: <span class="required">
                     * </span>
                  </label>
                  <div class="col-md-10">
                     <select class="form-control" name="user" id="user">
                        <option value="">Please Select</option>
                        @foreach ($users as $rowdata)
                        <option value="{{$rowdata->id}}" value2="{{$rowdata->first_name}} {{$rowdata->last_name}}">{{$rowdata->first_name}} {{$rowdata->last_name}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-2 control-label">Title: <span class="required">
                     * </span>
                  </label>
                  <div class="col-md-10">
                     <input type="text" class="form-control" name="title" value="{{$notice->title}}" placeholder="Title" maxlength="254">
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-2 control-label">Details: <span class="required">
                     * </span>
                  </label>
                  <div class="col-md-10">
                     <textarea type="text" class="form-control" name="details" maxlength="10000" rows="3" placeholder="Details">{{$notice->details}}</textarea>
                  </div>
               </div>
               <div class="form-group">
                  <label class="col-md-2 control-label">Attachment:
                  </label>
                  <div class="col-md-10">
                     <input class="btn btn-primary" type="file" id="files" name="attachment"><br/>

                     <div id="selectedFiles">
                        <embed src="{{ asset('notice_docs/'.$notice->attachment) }}" width="100" height="100" />
                     </div>
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
<script>
   var selDiv = "";
   var storedFiles = [];
   
   $(document).ready(function() {
      $("#files").on("change", handleFileSelect);
      
      selDiv = $("#selectedFiles"); 
      $("#myForm").on("submit", handleForm);
      
      // $("body").on("click", ".selFile", removeFile);
   });
      
   function handleFileSelect(e) {
      var files = e.target.files;
      var filesArr = Array.prototype.slice.call(files);
      selDiv.empty();
      filesArr.forEach(function(f) {         

         // if(!f.type.match("image.*")) {
         //    return;
         // }
         storedFiles.push(f);

         var reader = new FileReader();
         reader.onload = function (e) {
            var html = "<div style='max-height: 150px; max-width: 150px; float: left; background-color: #fff; margin: 10px;'><embed src=\"" + e.target.result + "\" data-file='"+f.name+"' class='selFile'><br clear=\"left\"/></div>";
            selDiv.append(html);
            
         }
         reader.readAsDataURL(f); 
      });
      // <span class='close' onclick='this.parentNode.parentNode.removeChild(this.parentNode); return false;' title='Click to remove'>x</span>
      
   }
      
   function handleForm(e) {
      e.preventDefault();
      var data = new FormData();
      
      for(var i=0, len=storedFiles.length; i<len; i++) {
         data.append('files', storedFiles[i]);  
      }
      
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'handler.cfm', true);
      
      xhr.onload = function(e) {
         if(this.status == 200) {
            console.log(e.currentTarget.responseText);   
            alert(e.currentTarget.responseText + ' items uploaded.');
         }
      }
      
      xhr.send(data);
   }
      
   // function removeFile(e) {
   //    var file = $(this).data("file");
   //    for(var i=0;i<storedFiles.length;i++) {
   //       if(storedFiles[i].name === file) {
   //          storedFiles.splice(i,1);
   //          break;
   //       }
   //    }
   //    $(this).parent().remove();
   // }
   // $("body").on("click", ".selFile", removeFile);
</script>
<script type="text/javascript">
   jQuery(document).ready(function() {
      Metronic.init(); // init metronic core components
      Layout.init(); // init current layout
      Demo.init(); // init demo features
      //EcommerceProductsEdit.init();
   });

   var elem = document.getElementById('notice_type');
   elem.onchange = function() {
      // alert(this.value);
      // var hiddenDiv = document.getElementByClassName("user-role-div");
      if(this.value == 1){
         $( ".user-role-div" ).addClass('hidden');
         $( ".user-div" ).addClass('hidden');
      }else if(this.value == 2){
         $( ".user-role-div" ).removeClass('hidden');
         $( ".user-div" ).addClass('hidden');
      }else if(this.value == 3){
         $( ".user-role-div" ).addClass('hidden');
         $( ".user-div" ).removeClass('hidden');
      }else{
         $( ".user-role-div" ).addClass('hidden');
         $( ".user-div" ).addClass('hidden');
      }

      var elem2 = $('#selected_list');
      elem2.empty();
      // $( ".user-role-div" ).removeClass('hidden');
      // $( ".user-div" ).removeClass('hidden');
      // hiddenDiv.style.display = (this.value == '0') ? "none" : "block";
   };

   var elem = document.getElementById('user_role');
   elem.onchange = function() {
      var user_role_ids = $("input[name='user_role_id[]']").map(function(){return $(this).val();}).get();

      if(jQuery.inArray(this.value, user_role_ids) !== -1){
         alert('This user role already exist in selected list.');
         return;
      }

      attr_value = $(this).find(':selected').attr('value2');

      var elem2 = $('#selected_list');
      var html = '<div class="col-md-3"><input type="hidden" name="user_role_id[]" value="'+this.value+'"><p>'+attr_value+' &nbsp;<span class="btn btn-danger btn-xs btn-circle" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;">x</span></p></div>';
      elem2.append(html);
   }

   var elem = document.getElementById('user');
   elem.onchange = function() {
      var user_ids = $("input[name='user_id[]']").map(function(){return $(this).val();}).get();

      if(jQuery.inArray(this.value, user_ids) !== -1){
         alert('This user already exist in selected list.');
         return;
      }

      attr_value = $(this).find(':selected').attr('value2');

      var elem2 = $('#selected_list');
      var html = '<div class="col-md-3"><input type="hidden" name="user_id[]" value="'+this.value+'"><p>'+attr_value+' &nbsp;<span class="btn btn-danger btn-xs btn-circle" onclick="this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;">x</span></p></div>';
      elem2.append(html);
   }
</script>

    <!-- END JAVASCRIPTS -->
@stop
