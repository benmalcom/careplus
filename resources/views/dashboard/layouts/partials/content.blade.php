<div class="col-sm-9">
    @include('dashboard.layouts.partials.topbar')
    <div class="row">
        <div class="col-sm-10 pb-10 shadow">
            @yield('content')
        </div>
        @include('dashboard.layouts.partials.right-aside')
    </div>

</div>
<div class="clearfix"></div>