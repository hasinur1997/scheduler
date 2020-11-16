@extends('layouts.app')

@section('content-header')
    <h3>{{ __('Edit Role') }}</h3>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card card-outline card-info">
        <div class="card-header">
        <h3 class="card-title">Update Role</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="{{ url('/roles/' . $role->id ) }}">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter role name" value="{{ $role->name }}">
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
                        <textarea name="description" id="desription" cols="" rows="" class="form-control @error('description') is-invalid @enderror">
                        {{ $role->description }}
                        </textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Permissions</label>
                    <div class="col-sm-9">
                        @foreach($permissions as $permission)
                            <label for="permission-{{ $permission->id }}">
                                <input 
                                    type="checkbox" 
                                    name="abilities[]" 
                                    id="permission-{{ $permission->id }}"  
                                    value="{{ $permission->id }}"
                                    {{ $role->abilities->contains($permission) ? 'checked' : '' }}
                                > 
                                    {{ $permission->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-default">Update Role</button>
            </div>
        </form>
    </div>
        </div>
        <div class="col-md-6">
            
        </div>
    </div>

@endsection