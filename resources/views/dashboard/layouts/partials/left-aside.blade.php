<div class="col-sm-3 m-0">
    <div class="title-background mt-0">
        <p class="text-center custom-care-font carezone-sm mt-20"><i class="fa fa-medkit"></i> care<span class="custom-zone-font">plus</span></p>
    </div>
    <div class="btn-group col-sm-12 mb-10  ml-0 pl-0 pr-0 mt-5">
        <button type="button" class="btn btn-default btn-sm btn-block dropdown-toggle simplebox text-blue text-muted p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <h6><i class="fa fa-user"></i> {{$user->email}} <span class="caret"></span></h6>
        </button>
        <ul class="dropdown-menu simplebox">
            <li><a href="{{url('/user/accounts')}}"><i class="fa fa-user-plus"></i> Your Account</a></li>
            <li><a href="{{url('/user/settings')}}"><i class="fa fa-cog"></i> Your Settings</a></li>
            <li><a href="{{url('/user/profile')}}"><i class="fa fa-user"></i> Your Profile</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{url('/logout')}}"><i class="fa fa-power-off"></i> Sign Out</a></li>
        </ul>
    </div>
    <div class="clearfix">

    </div>

    <div class="p-0 simplebox" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="text-muted shadow">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="text-muted text-center side-menu-toggle">
                <h5 class="uppercase">{{$user->full_name()}} <span class="caret" style="color: #F1632A;"></span>
                     </h5>
            </a>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in shadow" role="tabpanel" aria-labelledby="headingOne">
            <div class="p-0 mt-10 simplebox">
                <div class="list-group simplebox">
                    <a href="{{url('/journals/create')}}" class="list-group-item simplebox"><i class="fa fa-list-alt"></i> Journal</a>
                    <a href="{{url('/contacts')}}" class="list-group-item"><i class="fa fa-users"></i> Contacts</a>
                    <a href="{{url('/medications')}}" class="list-group-item"><i class="fa fa-medkit"></i> Medications</a>
                    <a href="{{url('/calendar-events')}}" class="list-group-item"><i class="fa fa-calendar"></i> Calendar</a>
                    <a href="{{url('/todos')}}" class="list-group-item"><i class="fa fa-tasks"></i> To-dos</a>
                    <a href="{{url('/notes')}}" class="list-group-item"><i class="fa fa-pencil"></i> Notes</a>
                    <a href="{{url('/uploads')}}" class="list-group-item"><i class="fa fa-file"></i> Photos and Files</a>
                    <a href="{{url('/user/profile')}}" class="list-group-item"><i class="fa fa-user"></i> Profile </a>
                </div>
            </div>
        </div>
        <div class="text-center p-0">
            <p><hr></p>
            <a class="btn btn-default btn-sm"><i class="fa fa-plus-square"></i> Add a care</a>
            <p><hr></p>
        </div>



    </div>


</div>