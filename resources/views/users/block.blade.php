<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
    <div class="card bg-light">
        {{-- <div class="card-header text-muted border-bottom-0">
            Digital Strategist
        </div> --}}
        <div class="card-body pt-10">
            <div class="row">
            <div class="col-7">
                <h2 class="lead"><b>{{ $user->name }}</b></h2>
                <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                <ul class="ml-4 mb-0 fa-ul text-muted">
                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> Email #: {{$user->email }}</li>
                </ul>
            </div>
            <div class="col-5 text-center">
                <img src="{{ asset('/images/default_profile.png') }}" alt="" class="img-circle img-fluid">
            </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="text-right">
            <a href="#" class="btn btn-sm bg-teal">
                <i class="fas fa-comments"></i>
            </a>
            <a href="{{ '/team/' . active_team()->id . '/users/' . $user->id . '/profile' }}" class="btn btn-sm btn-primary">
                <i class="fas fa-user"></i> View Profile
            </a>
            </div>
        </div>
    </div>
</div>