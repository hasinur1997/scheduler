@extends('layouts.app')

@section('content-header')
    <h3>{{ __('Profile') }}</h3>
@endsection

@section('content')
    <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('images/default_profile.png') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center">Software Engineer</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  B.S. in Computer Science from the University of Tennessee at Knoxville
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Location</strong>

                <p class="text-muted">Malibu, California</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="tag tag-danger">UI Design</span>
                  <span class="tag tag-success">Coding</span>
                  <span class="tag tag-info">Javascript</span>
                  <span class="tag tag-warning">PHP</span>
                  <span class="tag tag-primary">Node.js</span>
                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-outline card-info">
              <div class="card-header p-2" style="border-bottom: 0 !important">

                @php 
                    $tabs = [
                        'activity'   =>  'Activity',
                        'timeline'  =>  'Timeline',
                        'settings'  =>  'Settings',
                        'reports'   =>  'Reports',
                        'tasks'     =>  'My Tasks'
                    ]
                @endphp

                <ul class="nav nav-tabs">
                  @foreach($tabs as $key => $label)
                    <li 
                        class="nav-item" 
                    >

                        <a 
                            class="nav-link {{ $tab == $key ? 'active' : '' }}" 
                            href="{{ url( 'team/' . active_team()->id . '/users/' . $user->id . '/profile?tab=' . $key  ) }}" 
                        
                        >
                            {{ $label }}
                        </a>
                    </li>
                   @endforeach
                </ul>

              </div><!-- /.card-header -->
              <div class="card-body">
                @include('users.profile.tabs.' . $tab)
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
@endsection