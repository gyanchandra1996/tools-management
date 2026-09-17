@extends('layouts.master')

@section('content')

<!-- Content Header -->

<section class="content-header">
    <div class="container-fluid">


    <div class="row mb-2">

        <div class="col-sm-6">
            <h1>Tool Inventory</h1>
        </div>

        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Tool Inventory
                </li>

            </ol>
        </div>

    </div>

</div>


</section>

<!-- Main Content -->

<section class="content">

<div class="container-fluid">

    <!-- Success Message -->
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <button type="button"
                    class="close"
                    data-dismiss="alert">
                &times;
            </button>

            <i class="fas fa-check-circle mr-1"></i>

            {{ session('success') }}

        </div>

    @endif


    <!-- Error Message -->
    @if(session('error'))

        <div class="alert alert-danger alert-dismissible fade show">

            <button type="button"
                    class="close"
                    data-dismiss="alert">
                &times;
            </button>

            <i class="fas fa-exclamation-circle mr-1"></i>

            {{ session('error') }}

        </div>

    @endif


    <!-- Tool Table Card -->
    <div class="card">

        <div class="card-header">

            <h3 class="card-title">
                <i class="fas fa-tools mr-2"></i>
                Tool List
            </h3>

            <div class="card-tools">

                <a href="{{ route('admin.tools.create') }}"
                   class="btn btn-primary btn-sm">

                    <i class="fas fa-plus mr-1"></i>

                    Add New Tool

                </a>

            </div>

        </div>


        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th style="width: 60px;">
                                ID
                            </th>

                            <th style="width: 120px;">
                                Image
                            </th>

                            <th>
                                Tool Name
                            </th>

                            <th>
                                Category
                            </th>

                            <th style="width: 100px;">
                                Quantity
                            </th>

                            <th style="width: 160px;">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($tools as $tool)

                            <tr>

                                <!-- ID -->
                                <td>
                                    {{ $tool->id }}
                                </td>


                                <!-- Image -->
                                <td class="text-center">

                                    @if($tool->image)

                                        <img
    src="{{ asset('tools/' . $tool->image) }}"
    alt="{{ $tool->tool_name }}"
    width="80"
    height="80">

                                    @else

                                        <span class="text-muted">
                                            <i class="fas fa-image fa-2x"></i>
                                        </span>

                                    @endif

                                </td>


                                <!-- Tool Name -->
                                <td>

                                    <strong>
                                        {{ $tool->tool_name }}
                                    </strong>

                                </td>


                                <!-- Category -->
                                <td>

                                    <span class="badge badge-info">
                                        {{ $tool->category }}
                                    </span>

                                </td>


                                <!-- Quantity -->
                                <td>

                                    @if($tool->quantity > 0)

                                        <span class="badge badge-success">
                                            {{ $tool->quantity }}
                                        </span>

                                    @else

                                        <span class="badge badge-danger">
                                            0
                                        </span>

                                    @endif

                                </td>


                                <!-- Actions -->
                                <td>

                                    <!-- Edit -->
                                    <a href="{{ route(
                                        'admin.tools.edit',
                                        $tool->id
                                    ) }}"
                                       class="btn btn-warning btn-sm">

                                        <i class="fas fa-edit"></i>

                                        Edit

                                    </a>


                                    <!-- Delete -->
                                    <form
                                        action="{{ route(
                                            'admin.tools.destroy',
                                            $tool->id
                                        ) }}"
                                        method="POST"
                                        style="display:inline;">

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm(
                                                'Are you sure you want to delete this tool?'
                                            )">

                                            <i class="fas fa-trash"></i>

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center">

                                    <div class="py-4">

                                        <i class="fas fa-tools fa-3x text-muted mb-3"></i>

                                        <h5>
                                            No tools found
                                        </h5>

                                        <p class="text-muted">
                                            You have not added any tools yet.
                                        </p>

                                        <a href="{{ route('admin.tools.create') }}"
                                           class="btn btn-primary">

                                            <i class="fas fa-plus mr-1"></i>

                                            Add New Tool

                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        <!-- Card Footer -->
        <div class="card-footer">

            <a href="{{ route('admin.dashboard') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left mr-1"></i>

                Back to Dashboard

            </a>

        </div>

    </div>

</div>


</section>

@endsection
