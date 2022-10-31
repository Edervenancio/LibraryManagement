@extends('master')



<body class="bg-dark">


  <nav class="navbar navbar-dark bg-dark border-bottom border-danger">
    <div class="container-fluid">
      <h1 class="text-warning">SEARCH RENT</h1>
      <form action="<?= url('/search/rent') ?>" method="GET" class="d-flex input-group w-auto">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" id="input_id" name="query" />
        <button type="submit" class="btn btn-dark mx-1">SEARCH</a>
      </form>
    </div>
  </nav>

  <div class="container my-3">
    @if(session('danger'))
    <div class="alert alert-danger">
      {{ session('danger')}}
    </div>
    @endif
    <a href="{{ route('books.index')}}" a class="btn btn-primary my-2">BACK</a>
    <?php
    if (!empty($sql)) {
      echo "<table class='table table-striped table-dark table-bordered table-hover'>";
      echo "<thead class='bg-dark text-white'>
      <td>Id</td>
      <td>Rent date</td>
      <td>Expiration date</td>
      <td>Renovation date</td>
      <td>Book id</td>
      <td>User code</td>
      <td>Active </td>
     <td>User Actions</td>
         </thead>";
      foreach ($sql as $value) {
        // $linkEditItem = url('/imoveis/editar/' . $property->name_url);
        // $linkRemoveItem = url('/imoveis/remover/' . $property->name_url);
        $value->rentDate = date('d-m-Y', strtotime($value->rentDate));
        $value->expirationDate = date('d-m-Y', strtotime($value->expirationDate));
        $renovate = url('rent/' . $value->id . '/edit');
        $deactive = url('deactive/' . $value->id);

        echo "<tr>
                 <td> [ <b>$value->id ]</b> </td>
                 <td> [ $value->rentDate ] </td>
                 <td> [ $value->expirationDate ] </td>
                 <td> [ $value->renovationDate ]</td>
                 <td> [ $value->book ] </td>
                 <td> [ $value->user ] </td>
                 <td> [ $value->active ]</td>
                 <td> <a href='{$renovate}' class='btn btn-success btn-sm'>RENOVATE</a> | 
                      <a href='{$deactive}' class='btn btn-danger btn-sm'>DEACTIVE</a> </td>

            </tr>";
      }
      echo "</table>";
    }
    ?>
    <div class="row">{{ $sql->withQueryString()->links() }} </div>

  </div>
</body>