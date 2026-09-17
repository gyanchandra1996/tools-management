@extends('layouts.master')

@section('content')

<!-- Content Header -->

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">
                    Mechanic Dashboard
                </h1>
            </div>


        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item">
                    <a href="{{ route('mechanic.dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Mechanic
                </li>
            </ol>
        </div>
    </div>
</div>


</div>

<!-- Main Content -->

<section class="content">
    <div class="container-fluid">


    {{-- Success Message --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button"
                    class="close"
                    data-dismiss="alert">
                &times;
            </button>

            <i class="fas fa-check-circle mr-2"></i>
            {{ session('success') }}
        </div>
    @endif


    {{-- Error Message --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <button type="button"
                    class="close"
                    data-dismiss="alert">
                &times;
            </button>

            <i class="fas fa-exclamation-circle mr-2"></i>
            {{ session('error') }}
        </div>
    @endif


    {{-- Validation Errors --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <h5>
                <i class="fas fa-exclamation-triangle mr-2"></i>
                Please fix the following errors:
            </h5>

            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif


    <!-- Welcome / Profile Cards -->
    <div class="row">

        <!-- Welcome -->
        <div class="col-lg-4 col-md-6">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h4>
                        Welcome
                    </h4>

                    <p class="mb-0">
                        {{ auth()->user()->name }}
                    </p>
                </div>

                <div class="icon">
                    <i class="fas fa-user-cog"></i>
                </div>
            </div>
        </div>


        <!-- Mechanic Level -->
        <div class="col-lg-4 col-md-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>
                        {{ auth()->user()->mechanic_level }}
                    </h4>

                    <p class="mb-0">
                        Mechanic Level
                    </p>
                </div>

                <div class="icon">
                    <i class="fas fa-tools"></i>
                </div>
            </div>
        </div>


        <!-- Email -->
        <div class="col-lg-4 col-md-6">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h4>
                        <i class="fas fa-envelope"></i>
                    </h4>

                    <p class="mb-0">
                        {{ auth()->user()->email }}
                    </p>
                </div>

                <div class="icon">
                    <i class="fas fa-at"></i>
                </div>
            </div>
        </div>

    </div>


    <!-- Available Tools -->
    <div class="card card-primary">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-toolbox mr-2"></i>
                Available Tools
            </h3>

            <div class="card-tools">
                <span class="badge badge-light">
                    {{ $availableTools->count() }} Tools
                </span>
            </div>
        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover mb-0">

                    <thead class="thead-dark">
                        <tr>
                            <th style="width: 60px;">
                                ID
                            </th>

                            <th style="width: 100px;">
                                Image
                            </th>

                            <th>
                                Tool Name
                            </th>

                            <th>
                                Category
                            </th>

                            <th class="text-center">
                                Available Quantity
                            </th>

                            <th style="width: 250px;">
                                Issue Tool
                            </th>
                        </tr>
                    </thead>


                    <tbody>

                        @forelse($availableTools as $tool)

                            <tr>

                                <td>
                                    {{ $tool->id }}
                                </td>


                                <td class="text-center">

                                    @if($tool->image)

                                        <img
                                            src="{{ asset('tools/'.$tool->image) }}"
                                            alt="{{ $tool->tool_name }}"
                                            class="img-thumbnail"
                                            style="width: 70px; height: 70px; object-fit: cover;"
                                        >

                                                                            <img
  

                                    @else

                                        <div class="text-muted">
                                            <i class="fas fa-image fa-2x"></i>
                                            <br>
                                            <small>No Image</small>
                                        </div>

                                    @endif

                                </td>


                                <td>
                                    <strong>
                                        {{ $tool->tool_name }}
                                    </strong>
                                </td>


                                <td>
                                    <span class="badge badge-info">
                                        {{ $tool->category }}
                                    </span>
                                </td>


                                <td class="text-center">

                                    @if($tool->quantity > 5)

                                        <span class="badge badge-success">
                                            {{ $tool->quantity }}
                                        </span>

                                    @elseif($tool->quantity > 0)

                                        <span class="badge badge-warning">
                                            {{ $tool->quantity }}
                                        </span>

                                    @else

                                        <span class="badge badge-danger">
                                            0
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <form
                                        action="{{ route('mechanic.tools.issue', $tool->id) }}"
                                        method="POST"
                                        class="form-inline"
                                    >

                                        @csrf

                                        <div class="input-group input-group-sm"
                                             style="width: 100%;">

                                            <input
                                                type="number"
                                                name="quantity"
                                                class="form-control"
                                                min="1"
                                                max="{{ $tool->quantity }}"
                                                value="1"
                                                required
                                            >

                                            <div class="input-group-append">

                                                <button
                                                    type="submit"
                                                    class="btn btn-primary"
                                                >
                                                    <i class="fas fa-hand-holding mr-1"></i>
                                                    Issue
                                                </button>

                                            </div>

                                        </div>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="6"
                                    class="text-center py-4">

                                    <i class="fas fa-toolbox fa-3x text-muted mb-3"></i>

                                    <h5>
                                        No Tools Available
                                    </h5>

                                    <p class="text-muted mb-0">
                                        There are currently no tools available for issue.
                                    </p>

                                </td>
                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- My Issued Tools -->
    <div class="card card-success">

        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-clipboard-list mr-2"></i>
                My Issued Tools
            </h3>

            <div class="card-tools">
                <span class="badge badge-light">
                    {{ $myIssues->count() }} Records
                </span>
            </div>
        </div>


        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover mb-0">

                    <thead class="thead-dark">

                        <tr>

                            <th>
                                ID
                            </th>

                            <th>
                                Tool
                            </th>

                            <th class="text-center">
                                Quantity
                            </th>

                            <th>
                                Issue Date
                            </th>

                            <th>
                                Return Date
                            </th>

                            <th class="text-center">
                                Status
                            </th>

                            <th style="width: 150px;">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($myIssues as $issue)

                            <tr>

                                <td>
                                    {{ $issue->id }}
                                </td>


                                <td>

                                    <strong>
                                        {{ $issue->tool->tool_name }}
                                    </strong>

                                    <br>

                                    <small class="text-muted">
                                        {{ $issue->tool->category }}
                                    </small>

                                </td>


                                <td class="text-center">

                                    <span class="badge badge-info">
                                        {{ $issue->quantity }}
                                    </span>

                                </td>


                                <td>
                                    {{ $issue->issue_date }}
                                </td>


                                <td>

                                    @if($issue->return_date)

                                        {{ $issue->return_date }}

                                    @else

                                        <span class="text-muted">
                                            Not Returned
                                        </span>

                                    @endif

                                </td>


                                <td class="text-center">

                                    @if($issue->status === 'issued')

                                        <span class="badge badge-warning">
                                            <i class="fas fa-clock mr-1"></i>
                                            Issued
                                        </span>

                                    @elseif($issue->status === 'returned')

                                        <span class="badge badge-success">
                                            <i class="fas fa-check mr-1"></i>
                                            Returned
                                        </span>

                                    @else

                                        <span class="badge badge-secondary">
                                            {{ ucfirst($issue->status) }}
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    @if($issue->status === 'issued')

                                        <form
                                            action="{{ route('mechanic.tools.return', $issue->id) }}"
                                            method="POST"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="btn btn-success btn-sm btn-block"
                                            >
                                                <i class="fas fa-undo mr-1"></i>
                                                Return Tool
                                            </button>

                                        </form>

                                    @else

                                        <button
                                            type="button"
                                            class="btn btn-secondary btn-sm btn-block"
                                            disabled
                                        >
                                            <i class="fas fa-check mr-1"></i>
                                            Returned
                                        </button>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="7"
                                    class="text-center py-4">

                                    <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>

                                    <h5>
                                        No Issued Tools
                                    </h5>

                                    <p class="text-muted mb-0">
                                        You have not issued any tools yet.
                                    </p>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>


    <!-- Logout -->
    <div class="row">

        <div class="col-12">

            <div class="card">

                <div class="card-body text-right">

                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                        class="d-inline"
                    >

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Logout
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


</section>

@endsection
