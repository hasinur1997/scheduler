@extends('layouts.master')

@section('main')
    <div class="wrapper">
    <!-- Navbar -->
    @include('layouts.navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    
    <!-- Main Content -->
    <div class="content-wrapper" id="app">
        <section class="content-header">
            <div class="container-fluid">
                @yield('content-header')
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
@endsection