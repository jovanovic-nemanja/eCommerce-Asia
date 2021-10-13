<?php
  use App\Model\BdtdcProductDescription;
  $user_id = Sentinel::getUser()->id;
?>
@if($inquiry)
@if($inquiry->is_RFQ == 1)
<div>
    <h5 class="text-center">Inquiry/Product Title:</h5>
    <p class="text-center"><a title="{{$inquiry->inquery_title}}" target="_blank" href="{{URL::to('product-sourcing/view',$inquiry->id)}}">{{$inquiry->inquery_title}}.</a></p>
</div>
@else
<div class="row">
    <div class="col-md-6" style="border-right: 1px solid #eee;">
          <h5 class="text-center">Inquiry/Product Title:</h5>
          <?php
          $product_name_title = 'No title found';
            if($inquiry->is_join_quotation == 1){
                $product_name_title = 'join';
            }else{
                if($inquiry->inq_products_description){
                    $product_name_title = $inquiry->inq_products_description->name;
                }else if($inquiry->inquery_title){
                    $product_name_title = $inquiry->inquery_title;
                }
            }
          ?>
          @if($product_name_title == 'join')
            <p class="text-left"><a title="{{$inquiry->inquery_title}}" target="_blank" href="{{URL::to('product-sourcing/view',$inquiry->id)}}">{{$inquiry->inquery_title}}.</a></p>
          @else
            <p class="text-left"><a title="{{$product_name_title}}" target="_blank" href="{{URL::to('product-sourcing/view',$inquiry->id)}}">{{$product_name_title}}.</a></p>
          @endif
    </div>
    <div class="col-md-6">
          <h5 class="text-center">Inquiry/Product Source:</h5>
        @if($inquiry->is_RFQ == 1)
          <p class="text-right"><a title="{{$product_name_title}}" target="_blank" href="{{URL::to('product-sourcing/view',$inquiry->id)}}">{{$product_name_title}}.</a></p>
        @else
          <?php
            $p_id_array = explode(',', trim($inquiry->product_id));
            foreach ($p_id_array as $key => $value) {
              $product_details = BdtdcProductDescription::where('product_id',$value)->first();
              if($product_details){
              ?>
              <p class="text-right"><a title="{{$product_details->name}}" itemprop="url" target="_blank" href="{{ URL::to('product-details/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $product_details->name).'='.mt_rand(100000000, 999999999).$product_details->product_id) }}">{{$product_details->name}}</a></p>
              <?php
              }
            }
          ?>
        @endif
    </div>
</div>
@endif
<hr />
<div class="row">
    <div class="col-md-6 text-left">
        <h5>Inquiry Sender Info:</h5>
        @if($inquiry->inq_sender_user)
            @if($inquiry->sender_company)
            <p><a target="_blank" href="{{URL::to('contact/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $inquiry->sender_company->name_string->name),$inquiry->sender_company->id)}}">{{ $inquiry->inq_sender_user->first_name }} {{ $inquiry->inq_sender_user->last_name }}</a></p>
            <p><a target="_blank" href="{{URL::to('Home/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $inquiry->sender_company->name_string->name),$inquiry->sender_company->id)}}">{{ $inquiry->sender_company->name_string->name }}</a></p>
            @else
              Sender Company Not available
            @endif
        @else
            Not Available
        @endif
        @if($inquiry->sender_customers_info)
          <p>{{$inquiry->sender_customers_info->telephone}}</p>
        @endif
        @if($inquiry->sender_company)
          @if(trim($inquiry->sender_company->owner_contact) != '')
          <p>{{$inquiry->sender_company->owner_contact}} (Owner)</p>
          @endif
        @endif
    </div>
    <div class="col-md-6 text-right" style="border-right: 1px solid #eee;">
        <h5>Inquiry Product Owner Info:</h5>
        @if($inquiry->product_owner_user)
            @if($inquiry->product_owner_company)
            <p><a target="_blank" href="{{URL::to('contact/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $inquiry->product_owner_company->name_string->name),$inquiry->product_owner_company->id)}}">{{ $inquiry->product_owner_user->first_name }} {{ $inquiry->product_owner_user->last_name }}</a></p>
            <p><a target="_blank" href="{{URL::to('Home/'.preg_replace('/[^A-Za-z0-9\.-]/', '-', $inquiry->product_owner_company->name_string->name),$inquiry->product_owner_company->id)}}">{{ $inquiry->product_owner_company->name_string->name }}</a></p>
            @else
              Owner Company Not available
            @endif
        @else
            Not Available
        @endif
        @if($inquiry->product_owner_customers_info)
          <p>{{$inquiry->product_owner_customers_info->telephone}}</p>
        @endif
        @if($inquiry->product_owner_company)
          @if(trim($inquiry->product_owner_company->owner_contact) != '')
          <p>{{$inquiry->product_owner_company->owner_contact}} (Owner)</p>
          @endif
        @endif
    </div>
</div>
<hr />
<div class="text-center">
    <h5>Message:</h5>
    <div>{!!$inquiry->message!!}</div>
</div>
<hr />
<div>
    <h5 class="text-center">Inquiry/Product Images:</h5>
    <div>
      @if($inquiry->is_join_quotation != 1)
        @if(count($inquiry->inq_products_images_all) > 0)
          @foreach($inquiry->inq_products_images_all as $image)
              @if($inquiry->inq_products_description)
              <a title="{{$inquiry->inq_products_description->name}}" href="{{ URL::to($image->image) }}" target="_blank"><img src="{{ URL::to($image->image) }}" height="110" width="110" alt="{{$inquiry->inq_products_description->name}}" style="padding-bottom:3px;"></a> 
              @endif
          @endforeach
        @endif
      @else
        <?php
          $p_id_array = explode(',', trim($inquiry->product_id));
          foreach ($p_id_array as $key => $value) {
            $product_details = BdtdcProductDescription::where('product_id',$value)->first();
            if($product_details){
            ?>
              @if(count($product_details->proimages_new) > 0)
                @foreach($product_details->proimages_new as $image)
                    <a title="{{$product_details->name}}" href="{{ URL::to($image->image) }}" target="_blank"><img src="{{ URL::to($image->image) }}" height="110" width="110" alt="{{$product_details->name}}" style="padding-bottom:3px;"></a> 
                @endforeach
              @endif
            <?php
            }
          }
        ?>
      @endif
      @if(count($inquiry->inq_docs) > 0)
          <h5>Attached Images</h5>
          @foreach($inquiry->inq_docs as $image)
              <a title="{{$inquiry->inquery_title}}" href="{{ URL::to('buying-request-docs',$image->docs) }}" target="_blank"><img src="{{ URL::to('buying-request-docs',$image->docs) }}" height="110" width="110" alt="{{$inquiry->inquery_title}}" style="padding-bottom:3px;"></a> 
          @endforeach
      @endif
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-6 text-left" style="border-right: 1px solid #eee;">
        <h5>Destination Port:</h5>
        <p>{{$inquiry->destination_port}}</p>
    </div>
    <div class="col-md-6 text-right">
        <h5>Payment Term:</h5>
        <p>{{$inquiry->payment_terms}}</p>
    </div>
</div>
<hr />
<div class="row">
    <div class="col-md-4 text-left" style="border-right: 1px solid #eee;">
        <h5>Quantity:</h5>
        <p>{{$inquiry->quantity}}</p>
    </div>
    <div class="col-md-4 text-center" style="border-right: 1px solid #eee;">
        <h5>Asking Unit Price:</h5>
        <p> @if(trim($inquiry->pre_unit_price) != '')
              @if(trim($inquiry->currency) != '')
                  {{$inquiry->currency}} 
              @else
                  USD
              @endif
              {{$inquiry->pre_unit_price}} / 
              @if($inquiry->BdtdcSupplierQueryProductUnit)
                  {{$inquiry->BdtdcSupplierQueryProductUnit->name}}
              @else
                  pieces
              @endif
          @endif
        </p>
    </div>
    <div class="col-md-4 text-right">
        <h5>Payment Type:</h5>
        <p>{{$inquiry->payment_type}}</p>
    </div>
</div>
@endif