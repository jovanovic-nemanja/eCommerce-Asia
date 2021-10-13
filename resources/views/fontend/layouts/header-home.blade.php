@include('fontend.layouts.topbar-home')
<div class="container">
<div class="row topbar_sha" style="box-shadow:none;margin-bottom:10px;padding:0">
<div class="col-md-2 col-sm-2" style="padding-top:">
@include('fontend.layouts.all-category-list')
</div>
<div class="col-md-1 col-sm-1" style="padding-top:">
</div>
<div class="mn-rit col-md-9 col-sm-9" style="float:left;padding-left:0">
@if(isset($toplink))
<div style="position:relative;float:left;min-width:120px;padding:5px 0;margin-left:5px" class="hotproduct_menutitle"><span style="font-size:1em;font-weight:600">Hot Products:</span>
</div>
<ul class="list-inline hotproduct_menu" itemscope itemtype="http://schema.org/SiteNavigationElement" style="padding:5px 0;margin:0;margin-left:125px;">
@foreach($toplink as $link)
<li itemscope itemtype="http://data-vocabulary.org/Product"><a rel="category" itemprop="url" href="{{URL::to(strtolower(preg_replace('/[^A-Za-z0-9\.-]/','',preg_replace('/[^A-Za-z0-9\.,&-]/','-',$link->name))).'-products/0',$link->id) }}"><span itemprop="name">{{ $link->name}}</span></a></li>
@endforeach
</ul>
@else
@endif
</div>
</div>
</div>
</section>