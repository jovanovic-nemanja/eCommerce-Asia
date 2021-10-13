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
                href="{{ URL::to('email/veryfication_by_key',$rand_key) }}" style="margin-top: 5%; min-height: 30px; border-radius: 5px; background: rgb(25, 70, 111) none repeat scroll 0% 0%; color: rgb(255, 255, 255); font-size: 20px; padding: 2% 5%; text-decoration: none;" >Verify Your Email</a>
                </div>
                <div class="col-sm-11">
                    <p style="width: 60%;line-height: 30px;font-size: 18px;font-family: sans-serif;letter-spacing: initial;white-space: pre-line;font-weight: 800;color: #999;">
                       you can click the button above or click the link below to complete the registration or copy the following linkin to address bar of your browser to complete the registration.

                       <a href="{{ URL::to('email/veryfication_by_key',$rand_key) }}">
                           http://bdtdc.com/email/veryfication_by_key/{{ $rand_key }}
                       </a>
                    </p>
                    
                </div>
               
             
            </div>
        
        </div>

    </body>
</html>