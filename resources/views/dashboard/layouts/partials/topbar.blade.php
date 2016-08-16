<div class="nav row p-3">
    <div class="col-sm-2 col-xs-4">
        <img src="{{empty(Auth::user()->avatar)  ? asset('/img/no-avatar.png') : asset('/img/avatar/'.Auth::user()->avatar)}}" class="img-responsive profile-pic-nav mt-20 ml-20">
    </div>
    <div class="col-sm-8 col-xs-8 shadow simplebox">
        @if(isset($topBarTitle))
            <h2 class="text-muted custom-zone-font header-title">Careplus | {{$topBarTitle}}</h2>
            @endif
        @if(isset($topBarSubTitle))
                <h6 class="text-muted">{{$topBarSubTitle}}</h6>
            @endif
    </div>
</div>