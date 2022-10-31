@extends('master')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

<body class="bg-success bg-gradient">
    <section class="vh-100">
        <div class="container">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 10px;">

                        <div class="card-body p-4 p-md-5">

                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>

                            @if(session('danger'))
                            <div class="alert alert-danger">
                                {{ session('danger')}}
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <form action="{{ route('users.store')}}" method="post">
                                        @csrf
                                        <div class="form-outline">
                                            <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                            <label class="form-label" for="name">Full Name</label>
                                        </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" id="cpf" name="cpf" class="form-control form-control-lg" />
                                        <label class="form-label" for="cpf">CPF</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">

                                    <div class="form-outline datepicker w-100">
                                        <input type="date" class="form-control form-control-lg" id="birth" name="birth" />
                                        <label for="birth" class="form-label">Birthday</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="text" id="address" name="address" class="form-control form-control-lg" />
                                        <label class="form-label" for="address">Address</label>
                                    </div>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="email" id="email" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="email">Email</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="tel" id="phone" name="phone" class="form-control form-control-lg" />
                                        <label class="form-label" for="phone">Phone Number</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" />
                                        <label class="form-label" for="password">Password</label>
                                    </div>

                                </div>
                                <div class="col-md-6 mb-4 pb-2">

                                    <div class="form-outline">
                                        <input type="password" id="rpassword" name="rpassword" class="form-control form-control-lg" />
                                        <label class="form-label" for="rpassword">Repeat Password</label>
                                    </div>

                                </div>
                            </div>


                            <div class="mt-4 pt-2">
                                <input class="btn btn-primary btn-lg" type="submit" value="Submit" />
                            </div>
                            </form>
                        </div>


                    </div>
                </div>
            </div>
    </section>
    <script type="text/javascript" src="{{ URL::asset('js/validations.js') }}"></script>
</body>