Click here to reset your password: <a href="{{ URL::to('reset_password/'.$token) }}">{{ URL::to('reset_password/'.$token) }}</a>
<input type="hidden" name="token" value="{{ $token }}">
