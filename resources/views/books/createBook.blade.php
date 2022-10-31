@extends('master')

<body class="bg-dark">






    <div class="container bg-light my-5 p-2 form-control">
        <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
            @csrf


            <div class="row g-3">
                <div class="col-md-6">
                    <label for="name" class="form-label fw-bold">Book Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Book Name" autocomplete>
                </div>

                <div class="col-md-6">
                    <label for="price" class="form-label fw-bold">Price</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Last Name">
                </div>

                <div class="col-md-6">
                    <label for="category" class="form-label fw-bold">Category</label>
                    <select id="category" name="category" class="form-control">
                        <option value="autoajuda">Auto-ajuda</option>
                        <option value="contos">Contos</option>
                        <option value="ficcao">Ficção Científica</option>
                        <option value="literatura">Literatura</option>
                        <option value="poesia">Poesia</option>
                        <option value="enciclopedias">Enciclopedias</option>
                        <option value="escolar">Escolar</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="quantity" class="form-label fw-bold">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="password">
                </div>

                <div class="col-md-6 form-group">
                    <label for="description" class="form-label fw-bold">Description</label>
                    <textarea style="resize: none;" class="form-control" id="description" name="description" rows="3"></textarea>
                </div>


                <div class="col-6">
                    <label for="image" class="form-label fw-bold">BOOK IMAGE</label><br>
                    <input type="file" class="form-control form-control-lg" name="imageUrl" id="file">
                </div>
                <div class="col-6">
                    <a href="{{ route('books.index') }}" class="btn btn-danger padding-top">CANCEL</a>
                    <button type="submit" class=" btn btn-primary padding-top">Submit</button>
                </div>

            </div>
        </form>
    </div>
</body>