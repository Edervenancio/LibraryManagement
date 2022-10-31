@extends('master')


<body class="bg-dark">
  <div class="container my-3">


    <a href="{{ route('users.show', $user->id)}}" class="btn btn-primary mb-2">BACK</a>
    <?php
    if (!empty($rent) && !empty($user)) {
      $rent->rentDate = date('d-m-Y', strtotime($rent->rentDate));

      echo "<table class='table table-striped table-dark table-bordered table-hover'>";
      echo "<thead class='bg-dark text-white'>
    <td>Id</td>
    <td>Rent date</td>
    <td>Expiration date</td>
    <td>Renovation Date</td>
    <td>Book name</td>
    <td>User name</td>
    <td>Value</td>
         </thead>";
      echo "<tr>
                 <td> [ <b> $rent->id  ]</b> </td>
                 <td> [ $rent->rentDate ] </td>
                 <td> [ $rent->expirationDate ] </td>
                 <td> [ $rent->renovationDate ] </td> 
                 <td> [ $books->name] </td>
                 <td> [ $user->name ]</td>
                 <td> [ R$" . number_format($books->price, 2, ',', '.') . "]</td>
            </tr>";
    }
    echo "</table>";

    ?>
  </div>
</body>