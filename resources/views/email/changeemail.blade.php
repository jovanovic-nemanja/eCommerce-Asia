<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  
    </head>
    <body>
		<div class="container">
			<div class="row" style="margin-top:20px;margin-bottom:20px;background-color:#fff !important;">
					<div class="col-sm-12" style="margin-top:20px;margin-bottom:20px;">
						<div class="col-sm-2"></div>
						<div class="col-sm-8" id="item_sha">
							<!-- <div class="col-sm-12" style="background-color:#19446F;">
								<h2 style="color:#fff !important;padding-bottom: 10px;">Success!!!</h2>
							</div> -->
							<div class="col-sm-12" style="background-color:#fff !important;">
								<p style="font-size: 18px;padding-top: 20px;">Dear {{ $data['name'] }} ,</p>
								<p style="padding-left: 5%;font-size: 16px;">Thanks for your feedback .</p>
								<p style="padding-left: 5%;font-size: 16px;"><span style="font-style:bold">Name:</span> {{ $data['name'] }}</p>
								<p style="padding-left: 5%;font-size: 16px;"><span style="font-style:bold">Email:</span> {{ $data['email'] }}</p>
								<p style="padding-left: 5%;font-size: 16px;"><span style="font-style:bold">Subject:</span> {{ $data['subject'] }}</p>
								<p style="padding-left: 5%;font-size: 16px;"><span style="font-style:bold">Message:</span> {{ $data['message'] }}</p>
								<p style="font-size: 16px;">Your regards,</p>
								<p style="font-size: 16px;">Sumon Al-Hasan Sk</p>
							</div>

						</div>
						<div class="col-sm-2"></div>

					</div>

					

			</div>
		</div>

	</body>
</html>
