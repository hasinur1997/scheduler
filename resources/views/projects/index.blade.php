@extends('layouts.app')

@section('content-header')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
    <a href="{{ url('/team/' . active_team()->id . '/projects/create') }}" class="btn btn-info btn-sm mb-4">Add New Project</a>
<div class="card card-outline card-info">
    {{-- <div class="card-header">
        {{-- <h3 class="card-title">Projects</h3> --}}
    {{-- </div> --}}
    <div class="card-body p-0">
        @if($projects->count())
            <table class="table projects">
                <thead>
                    <tr>
                        <th style="width: 1%">
                            #
                        </th>
                        <th style="width: 20%">
                            Project Name
                        </th>
                        <th style="width: 30%">
                            Team Members
                        </th>
                        <th>
                            Project Progress
                        </th>
                        <th style="width: 8%" class="text-center">
                            Status
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        @can('view', $project)
                            <tr>
                                <td>
                                    #
                                </td>
                                <td>
                                    <a href="{{ url('/team/' . active_team()->id . '/projects/' . $project->id) }}">
                                        {{ $project->name }}
                                    </a>
                                    <br/>
                                    <small>
                                        Created {{ $project->created_at->diffForHumans() }}
                                    </small>
                                </td>
                                <td>
                                    <ul class="list-inline">
                                        @foreach($project->users as $user)
                                            <li class="list-inline-item">
                                                <img alt="Avatar" class="table-avatar" src="{{ asset('/images/avatar.png') }}">
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="project_progress">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar bg-green" role="progressbar" aria-volumenow="57" aria-volumemin="0" aria-volumemax="100" style="width: {{$project->progress}}%">
                                            
                                        </div>
                                    </div>
                                    
                                    <small>
                                        @if($project->tasks()->count() != 0)
                                            {{$project->progress}}% Complete
                                        @else
                                            No tasks available
                                        @endif
                                    </small>
                                </td>
                                <td class="project-state">
                                    <span class="badge badge-success">Success</span>
                                </td>
                                <td class="project-actions text-right">
                                    <a 
                                        class="btn btn-primary btn-xs" 
                                        href="{{ url('/team/' . active_team()->id . '/projects/' . $project->id) }}"
                                    >
                                        <i class="fas fa-folder">
                                        </i>
                                        View
                                    </a>
                                    <a 
                                        class="btn btn-info btn-xs" 
                                        href="{{ url('/team/' . active_team()->id . '/projects/' . $project->id . '/edit') }}"
                                    >
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>
                                    <a class="btn btn-danger btn-xs" href="#">
                                        <i class="fas fa-trash">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endcan
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center p-4">No projects found.</p>
        @endif
    </div>
    <div class="card-footer">
        <nav>
            {{ $projects->links() }}
        </nav>
    </div>
<!-- /.card-body -->
</div>
    <!-- /.card -->
    
@endsection