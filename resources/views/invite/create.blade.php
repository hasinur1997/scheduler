@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            @include('layouts.flash')
            <form action="{{ url('/team/invite/' . active_team()->id) }}" method="POST">
                @csrf
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Invite User</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Enter user email address" name="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Send Invitation</button>
                        <a href="{{ url('/') }}" type="submit" class="btn btn-danger float-right">Cancel</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection