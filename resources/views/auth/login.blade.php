<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title><?= config('app.name') ?></title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet"
          href="{{ url('backend/plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet"
          href="{{ url('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet"
          href="{{ url('backend/dist/css/adminlte.min.css') }}">

</head>


<body class="hold-transition login-page">


<div class="login-box">


    <!-- Card -->
    <div class="card card-outline card-primary">


        <!-- Logo -->
        <div class="card-header text-center">

            <a href="/admin" class="h1">
                <b>Tools</b>Management
            </a>

        </div>


        <div class="card-body">


            <p class="login-box-msg">
                Sign in to start your session
            </p>


            <!-- Success Message -->
            @if(session('success'))

                <div class="alert alert-success">
                    {{ session('success') }}
                </div>

            @endif


            <!-- Validation Errors -->
            @if($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            <!-- LOGIN FORM -->
            <form action="{{ route('login.store') }}"
                  method="POST">

                @csrf


                <!-- Email -->
                <div class="input-group mb-3">

                    <input type="email"
                           class="form-control"
                           id="email"
                           name="email"
                           value="{{ old('email') }}"
                           placeholder="Enter email">

                    <div class="input-group-append">

                        <div class="input-group-text">

                            <span class="fas fa-envelope"></span>

                        </div>

                    </div>

                </div>


                <!-- Password -->
                <div class="input-group mb-3">

                    <input type="password"
                           class="form-control"
                           id="password"
                           name="password"
                           placeholder="Enter password">

                    <div class="input-group-append">

                        <div class="input-group-text">

                            <span class="fas fa-lock"></span>

                        </div>

                    </div>

                </div>


                <!-- Login Button -->
                <div class="row">

                    <div class="col-12">

                        <button type="submit"
                                class="btn btn-primary btn-block">

                            Login

                        </button>

                    </div>

                </div>


            </form>


            <!-- Create Mechanic Account -->
            <div class="text-center mt-3">

                <a href="{{ route('register') }}">
                    Create Mechanic Account
                </a>

            </div>


        </div>

    </div>

</div>


<!-- jQuery -->
<script src="{{ url('backend/plugins/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ url('backend/dist/js/adminlte.min.js') }}"></script>


</body>

</html>
