<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript"> 
        // hide-show
        $(document).ready(function(){
		    $("#spam-msg-list").hide();

		    $("#spam-msg").click(function(){
		        $("#spam-msg-list").toggle();
		    });
		});


        //  function show_sidebar()
        // {
        // document.getElementById('spam-msg').style.display="block";
        // }

        // function hide_sidebar()
        // {
        // document.getElementById('spam-msg-list').style.display="none";
        }
        </script>
  
    </head>
    <body>
        <div class="container">
            <div class="row" >
            <div class="col-sm-12 col-md-12" style="margin-top:30%;">
            	<p style="font-weight:700;padding-left:20px;padding-top:20px;padding-bottom:20px;padding-right:20px;font-size:35px;color:#333;">
            	<span style="color: #5B9BD1;">A confirmation email has been sent to your 
					mailbox</span> <span style="color: #337AB7;">{{$email}}</span></p>
				<p style="font-weight:700;font-size:25px;padding-left:20px;padding-right:20px;">Please sign into your email and click on the verification link within 24 hours to complete your registration.
				</p>
               
             
            </div>
            <div class="col-sm-12">
             	<p style="font-weight:700;font-size:25px;padding-left:3%;padding-right:20px;color: #337AB7;">I have not received the email</p>
            </div>
            <!-- <form action="{{ URL::to('registration/email/{email}',null) }}" method="post">
            	<input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div style="padding-left:5%;">
            	<button type="submit" class="btn btn-default" style="width: 50%; background:#255E98;"><span style="color: #fff; font-size: 25px;">Re-send email</span></button>
            </div>
        	</form> -->
            <!-- <div class='col-md-12 padding_0' style='background-color:#fff; padding-bottom:5%;'>
             <div class='col-sm-12' style='margin-left:-15px;'> -->
             <!-- <div id='spam-msg' onMouseOver='show_sidebar()'>
             	<p style="font-weight:700;font-size:25px;padding-left:5%;padding-right:20px;color: #337AB7;">I have not received the email</p>
             </div> -->

             <!-- <div id='spam-msg-list' style="padding-left:2%;font-weight:700;font-size:25px;">
                <ul>
                    <li>Please check your spam folder <br>If you have not received the email</li>
                    <li>Have not recieved ? <a href="{{URL::to('/')}}">Try using another email address</a></li>
                </ul>
            </div> -->
            <div id='spam-msg-list' style="padding-left:5%;font-weight:700;font-size:25px;">
                
                    <p>Please check your spam folder <br>If you have not received the email</p>
                    <p>Have not recieved ? <a href="{{URL::to('/')}}">Try using another email address</a></p>
                
            </div>
           <!--  </div>
            </div> -->
        
        </div>

    </body>
</html>