@extends('layouts.app')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1>{{ $project->name }}</h1>
            </div>
            <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Project Detail</li>
            </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection


@section('content')
    @php 
      $tabs = [
        'tasks'  =>  'Tasks Lists',
        'overview'  =>  'Overview',
        'discussion'  =>  'Discussion',
        'milestones'  =>  'Milestones'
      ];
    @endphp

    <div class="card card-outline card-info">
        <div class="card-header" style="border-bottom: 0 !important">
          <ul class="nav nav-tabs">
            @foreach($tabs as $key => $label)
              <li class="nav-item">
                <a 
                  class="nav-link {{ $key == $tab ? 'active' : '' }}" 
                  href="{{ url('/team/'. active_team()->id . '/projects/'. $project->id . '/?tab=' . $key) }}"
                >
                  {{ $label }}
                </a>
              </li>
            @endforeach
          </ul>
        </div>
        <div class="card-body">
          @include('projects.tabs.'. $tab )
        </div>
        <!-- /.card-body -->
    </div>
@endsection