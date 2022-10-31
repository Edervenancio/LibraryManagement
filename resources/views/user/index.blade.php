@extends('master')



<body class="bg-dark">
  <nav class="navbar navbar-dark bg-dark border-bottom border-danger">
    <div class="container-fluid">
      <h1 class="text-warning">USER PAGE</h1>
    </div>
  </nav>



  <div class="container my-3">



    <div class="container">
      <div class="main-body">
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <h1>User data</h1>
                  <img src="{{URL::asset('/images/user.png')}}" alt="Admin" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4></h4>
                    <p class="text-secondary mb-1">Birth: <?= $sql->birth ?> </p>
                    <p class="text-secondary mb-1">CPF: <?= $sql->cpf ?>
                    <p class="text-secondary mb-1">Phone: <?= $sql->phone ?>
                    <p class="text-danger mb-1">Unique Code: <?= $sql->uniqueCode ?>


                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3 w-100">
                    <h2 class="mb-0">Full Name: </h2>
                  </div>
                  <div class="col-sm-9 text-secondary">

                    <h4>{{ $sql->name}}</h4>

                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3 w-100">
                    <h2 class="mb-0">Email:</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <h4>{{ $sql->email}}</h4>

                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3 w-100">
                    <h2 class="mb-0">Address</h2>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <h4>{{ $sql->address}}</h4>
                  </div>
                </div>


                <hr>
                <a href="{{ route('rent.show', $sql->uniqueCode)}}" class="btn btn-primary my-2">CURRENT BOOK</a>
                <form method="POST" action="{{ url::to('logout') }}">
                  @csrf
                  <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                @if(session('danger'))
                <div class="alert alert-danger">
                  {{ session('danger')}}
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>