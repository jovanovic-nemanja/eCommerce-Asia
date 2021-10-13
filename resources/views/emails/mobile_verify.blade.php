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
            <div class="row" >
            <div class="col-sm-12 col-md-12">
            <div class="col-sm-1 col-md-1"></div>
                <div class="col-sm-10">
                            <img style="padding:0;margin:0;float:left;" src="http://aboutus.bdtdc.com/images/logo.png" alt="bdtdc-logo">
                </div>
                <div class="col-sm-1 col-md-1"></div>
                </div>


                <div class="col-sm-11">
                    <p style="width: 100%;float: left;display: block;padding-top: 6%;font-size: 18px;font-weight: 600; padding-bottom:2%;">Please verify your email address to finish your account registration.</p>
                    <br>
                    <h3 style="font-size: 16px;display: block;font-weight: 600;color: #999;padding-top: 2%;padding-left: 30% margin:0;">(Valid for 24 hours):</h3>
                </div>
                <div class="col-sm-11" style="padding-left: 14%; padding-bottom: 7%; padding-top: 5%;">
                    <a href="{{ URL::to('email/verification_by_key',$rand_key) }}" style="margin-top: 5%; min-height: 30px; border-radius: 5px; background: rgb(25, 70, 111) none repeat scroll 0% 0%; color: rgb(255, 255, 255); font-size: 20px; padding: 2% 5%; text-decoration: none;" >Verify Your Email</a>
                </div>
                <div class="col-sm-11">
                    <p style="width: 60%;line-height: 30px;font-size: 18px;font-family: sans-serif;letter-spacing: initial;white-space: pre-line;font-weight: 800;color: #999;">
                       You can either click the button above or the link below or even copy the following link to the address bar of your browser to complete your registration.

                       <a href="{{ URL::to('email/verification_by_key-mobile',$rand_key) }}">
                           email/verification_by_key-mobile/{{ $rand_key }}
                       </a>
                    </p>
                    
                </div>
               
             
            </div>
        
        </div>

    </body>
</html>