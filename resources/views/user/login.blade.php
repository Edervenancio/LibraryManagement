@extends('master')






<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{URL::asset('/images/library.png')}}" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form action="{{ route('auth.user')}}" method="post">

          <?= csrf_field(); ?>

          <!-- Email input -->
          <h1 class="font-weight-bold text-primary">Login</h1>
          <div class="form-outline mb-4">
            <input type="email" id="email" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address" />
            <label class="form-label" for="email">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" />
            <label class="form-label" for="password">Password</label>
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif


            @if(session('danger'))
            <div class="alert alert-danger">
              {{ session('danger')}}
            </div>
            @endif


            @if(session('success'))
            <div class="alert alert-success">
              {{ session('success')}}
            </div>
            @endif
          </div>


          <div class="d-flex justify-content-between align-items-center">



            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <a href="{{ route('users.create') }}" class="btn btn-success btn-lg">REGISTER</a>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  </div>
  <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
    <div class="text-white mb-3 mb-md-0">
      Copyright © 2022. All rights reserved.
    </div>


  </div>
</section>