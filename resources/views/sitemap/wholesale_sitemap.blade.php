@extends('fontend.master3')
@section('content')
<div class="row" style="margin-bottom:2%;background-color:#fff !important;">
	<div class="col-sm-12">
		<p style="font-size: 11px;"><a  href="{{URL::to('/')}}" style="color: #06C;">Home</a> <span style="font-family: Tahoma;color: #666;font-weight: 700;"><i class="fa fa-chevron-right" style="font-size: 8px;"></i> Site Map</p>
	</div>
	<div class="col-sm-12">
		<p style="color: #000;font-size: 14px;"><strong>Browse Alphabetically:</strong></p>
		<html>
				<head>
				<script>
					var btns = "";
					var letters = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
					var letterArray = letters.split("");
					for(var i = 0; i < 26; i++){
					    var letter = letterArray.shift();
					    btns += '<button class="mybtns" onclick="wholesale(\''+letter+'\');">'+letter+'</button>';
					}
					function wholesale(let){

					    window.location =""+let;
					}
				</script>
				</head>
				<body>
					<script> document.write(btns); </script>
				</body>
			</html>
	</div>
	<div class="col-sm-12" style="margin-top:2%;">
		@foreach($search as $s)
		<div class="col-sm-3">
			<p style="font-size: 12px;font-family: Arial;line-height: 18px;">
				<a href="{{URL::to('wholesale/'.preg_replace('/[^A-Za-z0-9\.-]/','-',explode(' ',$s->name))[0]) }}" style="color: #039;">{{substr($s->name,0,20)}}</a></p>
		</div>
		@endforeach
	</div>
	<div class="col-sm-12" style="margin-top:1%;">
		{!!$search->render()!!}
	</div>
</div>





@stop


@section('scripts')
<script type="text/javascript">


 
</script>

@stop