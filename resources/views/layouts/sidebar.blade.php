<aside class="main-sidebar sidebar-light-fuchsia elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
      <img src="{{ asset( 'images/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      @if(auth()->user()->hasActiveTeam())
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          {{-- <div class="image">
            <img src="{{ asset( 'images/user2-160x160.jpg' ) }}" class="img-circle elevation-2" alt="User Image">
          </div> --}}
          <div class="info">
            <a href="#" class="d-block">{{ active_team()->name }}</a>
          </div>
        </div>
      @endif

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="{{ url('/') }}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>
                 Workspace
              </p>
              <i class="fas fa-angle-left right"></i>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item dropdown">
                <a href="{{ url('/team/create') }}" class="nav-link">
                  <i class="nav-icon fas fa-folder-plus"></i>
                  <p>
                    Create new team
                  </p>
                </a>
                @if(auth()->user()->hasActiveTeam())
                  @can('manage', active_team())
                    <a href="{{ url('/team/invite') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Invite users
                      </p>
                    </a>
                  @endcan
                @endif
              </li>
              @if(auth()->user()->hasActiveTeam())
              <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Switch To
                  </p>
                  <i class="fas fa-angle-left right"></i>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item dropdown">
                      @if( $teams->count() )
                        @foreach($teams as $team)
                          
                          <a href="{{ url('/team/switch/' . $team->id) }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>
                              {{ $team->name }}
                            </p>
                          </a>
                        @endforeach
                      @else
                        <a href="#" class="dropdown-item">
                          No Workspace Found.
                        </a>
                      @endif
                    </li>
                </ul>
              </li>
              @endif
            </ul>
          </li>
          @if(auth()->user()->hasActiveTeam())
            @can('manage', active_team())
              <li class="nav-item">
                <a href="{{ url('/roles') }}" class="nav-link">
                  <i class="nav-icon fas fa-dice-d20"></i>
                  <p>
                    Roles
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/team/' . active_team()->id . '/users') }}" class="nav-link">
                  <i class="nav-icon fas fa-user-friends"></i>
                  <p>
                    Users
                  </p>
                </a>
              </li>
            @endcan
            <li class="nav-item">
              <a href="{{ url('/team/' . active_team()->id . '/projects') }}" class="nav-link">
                <i class="nav-icon fab fa-r-project"></i>
                <p>
                  Projects
                </p>
              </a>
            </li>
          @endif
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>