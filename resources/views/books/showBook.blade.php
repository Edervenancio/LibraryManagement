@extends('master')

<body class="bg-dark">
  <div class="container my-3 bg-dark">
    <br>
    <div class="container">
      <div class="main-body">
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                @if(session('danger'))
                <div class="alert alert-danger">
                  {{ session('danger')}}
                </div>
                @endif
                <div class="d-flex flex-column align-items-center text-center">
                  <h1>BOOK</h1>
                  <img src="{{ asset('images')}}/{{ $sql->imageUrl }}" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4><?= $sql->name; ?></h4>
                    <p class="text-secondary mb-1">Category: {{ $sql->category}} </p>
                    <p class="text-secondary mb-1">Avaliable: {{$sql->category}} </p>
                    <p class="text-secondary mb-1">Description: {{$sql->description}} </p>

                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <form action="{{  route('rent.store')}}" method="POST">
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Date of rent</h5>
                      <input type="date" class="form-control my-2" id="rentDate" name="rentDate">

                    </div>
                    <div class="col-sm-9 text-secondary">


                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Expiration date</h5>
                      <input type="date" class="form-control my-2" id="expirationDate" name="expirationDate">

                    </div>

                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-4">
                      <h4 class="mb-0">User (UniqueCode)</h5>
                        <input type="text" class="form-control my-2" id="uniqueCode" name="uniqueCode">
                    </div>
                    <div class="col-sm-9 text-secondary">


                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h5 class="mb-0">Price</h5>
                      <input type="number" readonly class="form-control my-2" id="inputPassword" value="{{ $sql->price}}">
                    </div>
                  </div>
                  <hr>
                  <input type="hidden" value="<?= $sql->id ?>" name="id" id="id">
                  @csrf
                  <button type="submit" class="btn btn-primary mx-2">GET</button>
                </form>
              </div>

            </div>
            <a href="{{ route('books.index')}}" class="btn btn-danger mb-2 mx-2">HOME</a>

          </div>
        </div>
      </div>
    </div>
  </div>
</body>