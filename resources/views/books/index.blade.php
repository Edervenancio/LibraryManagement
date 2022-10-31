@extends('master')



<body class="bg-dark">
  <nav class="navbar navbar-dark bg-dark border-bottom border-danger">
    <div class="container-fluid">
      <h1 class="text-warning">SEARCH BOOKS</h1>
      <form action="<?= url('/search/books') ?>" method="GET" class="d-flex input-group w-auto">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="input_id" name="query" />
        <button type="submit" class="btn btn-dark mx-1">SEARCH</a>
      </form>
    </div>
  </nav>



  <div class="container-fluid bg-dark">
    <div class="px-lg-5">
      <div>
        <a href="{{ route('books.create') }}" class="btn btn-success my-2">REGISTER BOOK</a>
        <a href="{{ route('rent.index') }}" class="btn btn-primary my-2">CHECK CURRENT RENTS</a>
        <form method="POST" class="float-start my-2 mx-1" action="<?= url('/logout') ?>">
          @csrf
          <button type="submit" class="btn btn-danger">LOGOUT</b>
        </form>
        @if(session('danger'))
        <div class="alert alert-danger">
          {{ session('danger')}}
        </div>
        @endif



      </div>

      <div class="row">

        <?php if (!empty($sql)) {
          foreach ($sql as $value) {


        ?>

            <!-- Gallery item -->
            <div class="col-xl-3 col-lg-4 col-md-6 mb-4 float-left">
              <div class="bg-white rounded shadow-sm "><img src="{{ asset('images')}}/{{ $value->imageUrl }}" alt="" height="300px" class="card-img-top">
                <div class="p-4">
                  <h5><?php echo $value->name; ?></h5>
                  <p class="small text-muted mb-0"><?php echo substr($value->description, 0, 60); ?>....</p>
                  <p class="small text-muted mb-0">Avaliable: <?php echo $value->quantity; ?></p>
                  <div class="d-flex align-items-center justify-content-between rounded-pill bg-dark px-3 py-2 mt-4">
                    <p class="small mb-0"><span class="text-light">R$<?php echo $value->price; ?></span></p>
                    <div class="badge badge-danger px-3 rounded-pill font-weight-normal">
                      <span class="text-light"><?php echo substr(
                                                  $value->category,
                                                  0,
                                                  7
                                                ); ?></span>
                    </div>
                    <div>
                      <a href="{{ route('books.show', $value->id) }}" class="btn btn-primary my-1 btn-sm rounded-pill">GET</a>
                    </div>
                    <div>
                      <a href="{{ route('books.edit', $value->id)}} " class="btn btn-primary my-1 btn-sm rounded-pill mx-2">EDIT</a>
                    </div>
                  </div>

                </div>
              </div>
            </div>
            <!-- End -->

          <?php } ?>
          <!-- End -->
        <?php
        } ?>

      </div>
      <div class="row">{{ $sql->links() }} </div>