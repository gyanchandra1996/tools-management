
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Mechanic Registration</title>


    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">


    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="{{ url('backend/plugins/fontawesome-free/css/all.min.css') }}">


    <!-- iCheck Bootstrap -->
    <link rel="stylesheet"
          href="{{ url('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">


    <!-- AdminLTE -->
    <link rel="stylesheet"
          href="{{ url('backend/dist/css/adminlte.min.css') }}">

</head>


<body class="hold-transition login-page">


<div class="login-box" style="width: 500px;">


    <!-- Card -->
    <div class="card card-outline card-primary">


        <!-- Header -->
        <div class="card-header text-center">

            <a href="/admin" class="h1">

                <b>Tools</b>Management

            </a>

        </div>


        <!-- Card Body -->
        <div class="card-body">


            <p class="login-box-msg">

                Create Mechanic Account

            </p>


            <!-- Success Message -->
            @if(session('success'))

                <div class="alert alert-success">

                    {{ session('success') }}

                </div>

            @endif


            <!-- Error Messages -->
            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- Registration Form -->
            <form action="{{ route('register.store') }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf


                <!-- Name -->
                <div class="input-group mb-3">

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}"
                           placeholder="Name">

                    <div class="input-group-append">

                        <div class="input-group-text">

                            <span class="fas fa-user"></span>

                        </div>

                    </div>

                </div>


                <!-- Email -->
                <div class="input-group mb-3">

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}"
                           placeholder="Email">

                    <div class="input-group-append">

                        <div class="input-group-text">

                            <span class="fas fa-envelope"></span>

                        </div>

                    </div>

                </div>


                <!-- Mobile -->
                <div class="input-group mb-3">

                    <input type="text"
                           name="mobile"
                           class="form-control"
                           value="{{ old('mobile') }}"
                           maxlength="10"
                           placeholder="Mobile">

                    <div class="input-group-append">

                        <div class="input-group-text">

                            <span class="fas fa-phone"></span>

                        </div>

                    </div>

                </div>


                <!-- Password -->
                <div class="input-group mb-3">

                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Password">

                    <div class="input-group-append">

                        <div class="input-group-text">

                            <span class="fas fa-lock"></span>

                        </div>

                    </div>

                </div>


                <!-- Mechanic Level -->
                <div class="input-group mb-3">

                    <select name="mechanic_level"
                            class="form-control">

                        <option value="">
                            Select Mechanic Level
                        </option>

                        <option value="Expert"
                            {{ old('mechanic_level') == 'Expert' ? 'selected' : '' }}>
                            Expert
                        </option>

                        <option value="Medium"
                            {{ old('mechanic_level') == 'Medium' ? 'selected' : '' }}>
                            Medium
                        </option>

                        <option value="New Recruit"
                            {{ old('mechanic_level') == 'New Recruit' ? 'selected' : '' }}>
                            New Recruit
                        </option>

                        <option value="Trainee"
                            {{ old('mechanic_level') == 'Trainee' ? 'selected' : '' }}>
                            Trainee
                        </option>

                    </select>

                    <div class="input-group-append">

                        <div class="input-group-text">

                            <span class="fas fa-tools"></span>

                        </div>

                    </div>

                </div>


                <!-- Picture -->
                <div class="form-group">

                    <label for="picture">
                        Picture
                    </label>

                    <div class="input-group">

                        <div class="custom-file">

                            <input type="file"
                                   name="picture"
                                   class="custom-file-input"
                                   id="picture">

                            <label class="custom-file-label"
                                   for="picture">

                                Choose picture

                            </label>

                        </div>

                    </div>

                </div>


                <!-- Register Button -->
                <div class="row">

                    <div class="col-12">

                        <button type="submit"
                                class="btn btn-primary btn-block">

                            <i class="fas fa-user-plus"></i>

                            Register

                        </button>

                    </div>

                </div>


            </form>


            <!-- Login Link -->
            <p class="mt-3 mb-0 text-center">

                <a href="{{ route('login') }}">

                    Already registered? Login

                </a>

            </p>


        </div>

    </div>

</div>


<!-- jQuery -->
<script src="{{ url('backend/plugins/jquery/jquery.min.js') }}">
</script>


<!-- Bootstrap -->
<script src="{{ url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}">
</script>


<!-- AdminLTE -->
<script src="{{ url('backend/dist/js/adminlte.min.js') }}">
</script>


</body>

</html>
