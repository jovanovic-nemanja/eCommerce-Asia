<div class="col-md-1 col-sm-3 col-xs-6 about">
    <h4>
        @if(null != $currentUser->fullName())
            {{{ $currentUser->fullName() }}}
        @endif
    </h4>
</div>
<div class="col-md-1 col-sm-3 col-xs-6 search_icon">
    <a data-toggle="tooltip"
       data-placement="bottom"
       title="Log Out"
       href="{{ URL::to('logout') }}">{{ HTML::image('assets/images/search_icon.png') }}
    </a>
</div>