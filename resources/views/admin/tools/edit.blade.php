@extends('layouts.master')

@section('content')

<!-- Content Header -->

<section class="content-header">

<div class="container-fluid">

    <div class="row mb-2">

        <div class="col-sm-6">
            <h1>Edit Tool</h1>
        </div>

        <div class="col-sm-6">

            <ol class="breadcrumb float-sm-right">

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="breadcrumb-item">
                    <a href="{{ route('admin.tools.index') }}">
                        Tools
                    </a>
                </li>

                <li class="breadcrumb-item active">
                    Edit Tool
                </li>

            </ol>

        </div>

    </div>

</div>

</section>

<!-- Main Content -->

<section class="content">


<div class="container-fluid">

    <div class="row">

        <!-- Form -->
        <div class="col-md-8">

            <div class="card card-primary">

                <!-- Card Header -->
                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-edit mr-2"></i>

                        Edit Tool Information

                    </h3>

                </div>


                <!-- Form -->
                <form
                    action="{{ route('admin.tools.update', $tool->id) }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    @method('PUT')


                    <div class="card-body">

                        <!-- Validation Errors -->
                        @if($errors->any())

                            <div class="alert alert-danger">

                                <h5>

                                    <i class="icon fas fa-ban"></i>

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


                        <!-- Tool Name -->
                        <div class="form-group">

                            <label for="tool_name">
                                Tool Name
                            </label>

                            <input
                                type="text"
                                id="tool_name"
                                name="tool_name"
                                class="form-control @error('tool_name') is-invalid @enderror"
                                value="{{ old('tool_name', $tool->tool_name) }}"
                                placeholder="Enter tool name">

                            @error('tool_name')

                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- Category -->
                        <div class="form-group">

                            <label for="category">
                                Tool Category
                            </label>

                            <select
                                id="category"
                                name="category"
                                class="form-control @error('category') is-invalid @enderror">

                                <option value="">
                                    Select Category
                                </option>

                                <option
                                    value="Screwdriver"
                                    {{ old('category', $tool->category) == 'Screwdriver' ? 'selected' : '' }}>
                                    Screwdriver
                                </option>

                                <option
                                    value="Wrench"
                                    {{ old('category', $tool->category) == 'Wrench' ? 'selected' : '' }}>
                                    Wrench
                                </option>

                                <option
                                    value="Plier"
                                    {{ old('category', $tool->category) == 'Plier' ? 'selected' : '' }}>
                                    Plier
                                </option>

                                <option
                                    value="Hammer"
                                    {{ old('category', $tool->category) == 'Hammer' ? 'selected' : '' }}>
                                    Hammer
                                </option>

                            </select>

                            @error('category')

                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- Quantity -->
                        <div class="form-group">

                            <label for="quantity">
                                Quantity
                            </label>

                            <input
                                type="number"
                                id="quantity"
                                name="quantity"
                                min="1"
                                class="form-control @error('quantity') is-invalid @enderror"
                                value="{{ old('quantity', $tool->quantity) }}"
                                placeholder="Enter quantity">

                            @error('quantity')

                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- Current Image -->
                        @if($tool->image)

                            <div class="form-group">

                                <label>
                                    Current Image
                                </label>

                                <div>

                                    <img
                                        src="{{ asset('tools/'.$tool->image) }}"
                                        alt="{{ $tool->tool_name }}"
                                        class="img-thumbnail"
                                        style="width:150px; height:150px; object-fit:cover;">

                                </div>

                            </div>

                        @endif


                        <!-- New Image -->
                        <div class="form-group">

                            <label for="image">
                                Change Tool Image
                            </label>

                            <div class="custom-file">

                                <input
                                    type="file"
                                    id="image"
                                    name="image"
                                    class="custom-file-input @error('image') is-invalid @enderror"
                                    accept="image/*"
                                    onchange="previewImage(event)">

                                <label
                                    class="custom-file-label"
                                    for="image">

                                    Choose new image

                                </label>

                            </div>

                            <small class="form-text text-muted">
                                Leave empty if you want to keep the current image.
                            </small>

                            @error('image')

                                <span class="text-danger d-block mt-1">
                                    {{ $message }}
                                </span>

                            @enderror

                        </div>


                        <!-- New Image Preview -->
                        <div
                            id="imagePreviewContainer"
                            class="form-group"
                            style="display:none;">

                            <label>
                                New Image Preview
                            </label>

                            <div>

                                <img
                                    id="imagePreview"
                                    src=""
                                    alt="New Tool Preview"
                                    class="img-thumbnail"
                                    style="width:150px; height:150px; object-fit:cover;">

                                </div>

                        </div>

                    </div>


                    <!-- Card Footer -->
                    <div class="card-footer">

                        <button
                            type="submit"
                            class="btn btn-primary">

                            <i class="fas fa-save mr-1"></i>

                            Update Tool

                        </button>


                        <a
                            href="{{ route('admin.tools.index') }}"
                            class="btn btn-secondary">

                            <i class="fas fa-arrow-left mr-1"></i>

                            Cancel

                        </a>

                    </div>

                </form>

            </div>

        </div>


        <!-- Information -->
        <div class="col-md-4">

            <div class="card card-info">

                <div class="card-header">

                    <h3 class="card-title">

                        <i class="fas fa-info-circle mr-2"></i>

                        Tool Information

                    </h3>

                </div>

                <div class="card-body">

                    <p>
                        You are editing:
                    </p>

                    <h5>
                        {{ $tool->tool_name }}
                    </h5>

                    <hr>

                    <p class="mb-1">
                        <strong>ID:</strong>
                        {{ $tool->id }}
                    </p>

                    <p class="mb-1">
                        <strong>Category:</strong>
                        {{ $tool->category }}
                    </p>

                    <p class="mb-0">
                        <strong>Quantity:</strong>
                        {{ $tool->quantity }}
                    </p>

                </div>

            </div>


            <!-- Tool List -->
            <div class="card card-secondary">

                <div class="card-body text-center">

                    <i class="fas fa-tools fa-3x text-secondary mb-3"></i>

                    <h5>
                        Tool Inventory
                    </h5>

                    <p class="text-muted">
                        Return to your tool list.
                    </p>

                    <a
                        href="{{ route('admin.tools.index') }}"
                        class="btn btn-secondary">

                        <i class="fas fa-list mr-1"></i>

                        Tool List

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


</section>

@endsection

@section('scripts')

<script>

    function previewImage(event)
    {
        let input = event.target;

        let preview = document.getElementById(
            'imagePreview'
        );

        let container = document.getElementById(
            'imagePreviewContainer'
        );

        if (input.files && input.files[0])
        {
            let reader = new FileReader();

            reader.onload = function(e)
            {
                preview.src = e.target.result;

                container.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }


    // Show selected file name
    document
        .querySelector('#image')
        .addEventListener('change', function(e)
        {
            let fileName = e.target.files[0]
                ? e.target.files[0].name
                : 'Choose new image';

            e.target
                .nextElementSibling
                .innerText = fileName;
        });

</script>

@endsection
