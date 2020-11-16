@extends('layouts.app')

@section('content-header')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create Projects</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <form action="{{ url('/team/' . active_team()->id . '/projects') }}" method="post">
            @csrf
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Project</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Project Name</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                        >

                        @error('name')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Project Description</label>
                        <textarea 
                            id="description" 
                            name="description" 
                            class="form-control @error('description') is-invalid @enderror"
                            rows="4"
                        >
                            {{ old('description') }}
                        </textarea>

                        @error('description')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Create New Porject" class="btn btn-success float-right">
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </form>
        <!-- /.card -->
    </div>
</div>
@endsection