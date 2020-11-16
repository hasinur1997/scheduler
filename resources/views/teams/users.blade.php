@extends('layouts.app')

@section('content-header')
    <h3>{{ __('Users') }}</h3>
@endsection

@section('content')
    {{-- {{ var_dump($users) }} --}}
<!-- Default box -->
<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row d-flex align-items-stretch">
            @if($users->count())
                @foreach($users as $user)
                    @include('users.block')
                @endforeach
            @else
                <p>{{ __('No users found') }}</p>
            @endif
        </div>
    </div>
        <!-- /.card-body -->
    <div class="card-footer">
        @include('users.pagination')
    </div>
    <!-- /.card-footer -->
</div>
    <!-- /.card -->
@endsection