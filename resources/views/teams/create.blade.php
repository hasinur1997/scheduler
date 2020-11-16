@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card card-outline card-info">
              <div class="card-header">
                <h3 class="card-title">Create New Workspace</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" method="post" action="{{ url('/team/store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Workspace Name</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" name="name"  id="name" placeholder="Enter workspace name">
                      @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                      <textarea name="description" id="desription" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">{{ __('Create Workspace') }}</button>
                  <a  href="{{ url('/home') }}" class="btn btn-default float-right">{{ __('Cancel') }}</a>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
        </div>
    </div>
@endsection