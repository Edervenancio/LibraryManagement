@extends('master')

<body class="bg-dark">

    <div class="container bg-light my-5 p-2 form-control">
        <form action="{{ route('rent.update', $sql->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label fw-bold">Expiration Date</label>
                    <input type="date" readonly value="<?= $sql->expirationDate; ?>" class="form-control" name="expirationDate" id="expirationDate" placeholder="Book Name">
                </div>

                <div class="col-md-6">
                    <label for="price" class="form-label fw-bold">Renovation Date</label>
                    <input type="date" class="form-control" name="renovationDate" id="renovationDate" placeholder="Last Name">
                </div>

                <div class="col-6">
                    <a href="{{ route('books.index') }}" class="btn btn-danger padding-top">CANCEL</a>
                    <button type="submit" class=" btn btn-primary padding-top">Submit</button>
                </div>

            </div>
        </form>
    </div>
</body>