@extends('layouts.app')

@section('content-header')
    <h3>{{ __('Abilities') }}</h3>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <create-ability></create-ability>
        </div>
        <div class="col-md-6">
            <ability-list></ability-list>
        </div>
    </div>

@endsection