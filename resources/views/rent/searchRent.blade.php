@extends('master')



<body class="bg-dark">
  <div class="container my-3">
    <a href="{{ route('rent.index') }}" class="btn btn-primary my-2">CHECK CURRENT RENTS</a>
    <a href="{{ route('books.index') }}" class="btn btn-primary my-2">BACK</a>
    <?php
    if (!empty($rent)) {
      echo "<table class='table table-striped table-dark table-bordered table-hover'>";
      echo "<thead class='bg-dark text-white'>
    <td>Id</td>
    <td>Rent date</td>
    <td>Expiration</td>
    <td>Renovation</td>
    <td>Book id</td>
    <td>User Code</td>
    <td>Status</td>
    <td>Actions</td>
         </thead>";
      foreach ($rent as $value) {
        // $linkReadMode = url('/show/car/' . $value->id);
        // $linkEditItem = url('/imoveis/editar/' . $property->name_url);
        // $linkRemoveItem = url('/imoveis/remover/' . $property->name_url);
        echo "<tr>
                 <td> [ $value->id ] </td>
                 <td> [ $value->rentDate ] </td>
                 <td> [ $value->expirationDate ] </td>
                 <td> [ $value->renovationDate ] </td>
                 <td> [ $value->book   ] </td>
                 <td> [ $value->user   ]</td>
                 <td> [ $value->active ]</td>
                 <td> <a href='{}' class='btn btn-danger btn-sm'> DETAILS</a> </td>
            </tr>";
      }
      echo "</table>";
    }
    ?>
    <div class="row">{{ $rent->withQueryString()->links() }} </div>

  </div>
</body>