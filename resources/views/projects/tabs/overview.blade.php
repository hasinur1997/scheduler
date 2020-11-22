<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span 
                    class="info-box-icon bg-info">
                    <i class="far fa-envelope">
                    </i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Task List</span>
                    <span class="info-box-number">{{ $project->tasks()->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
                <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Tasks</span>
                <span class="info-box-number">{{ $project->subTasks()->count() }}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
                
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning">
                        <i class="far fa-copy"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Discussion</span>
                        <span class="info-box-number">{{ $project->notices()->count() }}</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger">
                        <i class="far fa-star"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Milestones</span>
                        <span class="info-box-number">{{ $project->milestones()->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                    Assigned Users
                </h3>
            </div>
            <div class="card-body">
                @if($project->users()->count())
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($project->users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->profile['phone'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    <!-- End Col -->

    <div class="col-md-3">
        {{-- <users :team="{{ active_team() }}" :project="{{ $project }}"></user> --}}
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Users</h3>
                <div class="card-tools">
                    <button 
                        type="button" 
                        class="btn btn-tool" 
                    >
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ url('/team/'. active_team()->id .'/projects/' . $project->id . '/users') }}" method="POST">
                    @csrf
                    <div class="form-group" data-select2-id="46">
                        <select 
                            class="select2 select2-hidden-accessible" 
                            multiple="true" 
                            data-placeholder="Select a State" 
                            style="width: 100%;" 
                            data-select2-id="7" 
                            tabindex="-1" 
                            aria-hidden="true"
                            name="users[]"
                        >   
                            @foreach(active_team()->users as $user)
                                <option  
                                    data-select2-id="{{$user->id}}" 
                                    value="{{$user->id}}"
                                    {{$project->users->contains($user) ? 'selected' : ''}}
                                >
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-info btn-sm" value="Update Users">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
