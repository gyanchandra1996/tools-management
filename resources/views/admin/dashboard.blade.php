@extends('layouts.master')

@section('content')

<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Admin Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">

        <!-- Welcome -->
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline shadow-sm">
                    <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
                        <div>
                            <h4 class="mb-1">
                                <i class="fas fa-hand-sparkles text-warning mr-2"></i>
                                Welcome, {{ auth()->user()->name }}
                            </h4>
                            <p class="mb-0 text-muted">
                                Here is your tools dashboard overview.
                            </p>
                        </div>
                        <span class="text-muted small d-none d-md-block">
                            {{ now()->format('l, d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Small Boxes -->
        <div class="row">

            <!-- Total Tools -->
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="small-box bg-info elevation-2">
                    <div class="inner">
                        <h3>{{ $totalTools }}</h3>
                        <p>Total Tools</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <a href="{{ route('admin.tools.index') }}" class="small-box-footer">
                        Manage Tools <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <!-- Total Quantity -->
            <div class="col-lg-6 col-sm-6 col-12">
                <div class="small-box bg-success elevation-2">
                    <div class="inner">
                        <h3>{{ $totalQuantity }}</h3>
                        <p>Total Quantity</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <a href="{{ route('admin.tools.index') }}" class="small-box-footer">
                        View Tools <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>

        <!-- Manage Tools + Quick Actions -->
        <div class="row">

            <div class="col-md-6">
                <div class="card card-primary card-outline shadow-sm h-100">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-tools mr-2"></i> Tools Management
                        </h3>
                    </div>
                    <div class="card-body">
                        <p>
                            Manage your tools inventory, update quantities, and keep track of stock levels.
                        </p>
                        <a href="{{ route('admin.tools.index') }}" class="btn btn-primary">
                            <i class="fas fa-tools mr-1"></i> Manage Tools
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card card-outline card-secondary shadow-sm h-100">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-bolt mr-2"></i> Quick Actions
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-plus-circle text-success mr-2"></i>Add New Tool</span>
                                <a href="{{ route('admin.tools.index') }}" class="btn btn-sm btn-outline-primary">Go</a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><i class="fas fa-boxes text-info mr-2"></i>Update Quantities</span>
                                <a href="{{ route('admin.tools.index') }}" class="btn btn-sm btn-outline-primary">Go</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection