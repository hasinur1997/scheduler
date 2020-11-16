@extends('layouts.app')

@section('content-header')
    <h3>{{ __('Roles') }}</h3>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
    <div class="card card-outline card-info">
        <div class="card-header">
        <h3 class="card-title">Create new role</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal" method="post" action="{{ url('/roles') }}">
            @csrf
            <div class="card-body">
                <div class="form-group row">
                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Enter role name">
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
                        <textarea name="description" id="desription" cols="" rows="" class="form-control @error('description') is-invalid @enderror"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label"> Permissions</label>
                    <div class="col-sm-9">
                        @foreach($permissions as $permission)
                            <label for="permission-{{ $permission->id }}">
                                <input type="checkbox" name="abilities[]" id="permission-{{ $permission->id }}"  value="{{ $permission->id }}"> {{ $permission->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Create Role</button>
            </div>
        </form>
    </div>
        </div>
        <div class="col-md-6">
            @if($roles->count())
                <div class="card card-outline card-info">
                    <div class="card-header">
                    <h3 class="card-title">Roles</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th style="width: 40px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td style="display: flex">
                                        <a href="{{ url('roles/' . $role->id . '/edit') }}" class="btn btn-info btn-sm">Edit</a> 
                                        <form action="{{ url('roles/' . $role->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-warning btn-sm">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            @else:
                <p>No item found !</p>
            @endif
        </div>
    </div>

@endsection