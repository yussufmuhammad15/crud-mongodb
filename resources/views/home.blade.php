<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <title>mongodb tutorial</title>
  </head>
  <body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container" style="border-bottom: 5px solid orange; margin-top: 20px;">

    <!-- Button trigger modal -->
    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="float: right;" class="btn btn-primary">
      <i class="fa fa-plus"></i>
      tambah data
    </a>
      <h3 style="letter-spacing: 3px;">MongoDB Tutorial</h3>
    </div>

    <!-- table -->
    <div class="container" style="padding: 20px;">

    <table id="table_id" style="border:none;" class="table table-hover">
      <thead>
        <tr>
          <th style="width: 50px; text-align: center;" scope="col">No</th>
          <th style="width: 100px;" scope="col">kode</th>
          <th scope="col">Judul</th>
          <th style="width: 150px;" scope="col">Harga</th>
          <th style="width: 150px; text-align: center;" scope="col">aksi</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1
        @endphp
        @foreach ($buku as $key => $value) 

        <tr>
          <th style="text-align: center;" scope="row">{{$no++}}</th>
          <td>{{$value->kode}}</td>
          <td>{{$value->judul}}</td>
          <td>{{$value->harga}}</td>
          <td style="text-align: center;">
            <a href="javascript:void(0);" 
                data-kode="{{$value->kode}}"
                data-judul="{{$value->judul}}"
                data-harga="{{$value->harga}}"
                data-bs-toggle="modal"
                data-bs-target="#editModal" 
                class="btn btn-primary"><i class="fa fa-edit"></i></a>
            <a href="{{ route('buku.delete', $value->kode) }}" onclick="return confirm('are you sure want to delete this post?');" class="btn btn-danger"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
        @endforeach

      </tbody>
    </table>
      
    </div>


    <!-- PDF -->
    <div class="container">
      <a href="/cetak_pdf" target="_blank" class="btn btn-success">
        <i class="fa fa-download"></i>
        Report PDF
      </a>
    </div>



    <!-- Modal Add -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="post" action="/store"> 
              @csrf   
              <div style="padding: 10px;">
                <input type="text" required style="border-radius: 15px; width: 100%; outline: none; padding: 5px 10px; text-align: center;" placeholder="KODE" name="kode">
              </div>
              <div style="padding: 10px;">
                <input type="text" required style="border-radius: 15px; width: 100%; outline: none; padding: 5px 10px; text-align: center;" placeholder="JUDUL" name="judul">
              </div>
              <div style="padding: 10px;">
                <input type="text" required style="border-radius: 15px; width: 100%; outline: none; padding: 5px 10px; text-align: center;" placeholder="HARGA" name="harga">
              </div>
              <div style="padding: 10px; float: right;">
                
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
            
        </div>
      </div>
    </div>


    <!-- modal Edit -->
    <div class="modal fade" tabindex="-1" role="dialog" id="editModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="formupdate" class="" action="" method="post">
                @csrf
                @method('PUT')
                 <div style="padding: 10px;">
                  <input type="text" disabled required style="border-radius: 15px; width: 100%; outline: none; padding: 5px 10px; text-align: center;" placeholder="KODE" name="kode" id="kode">
                </div>
                <div style="padding: 10px;">
                  <input type="text" required style="border-radius: 15px; width: 100%; outline: none; padding: 5px 10px; text-align: center;" placeholder="JUDUL" name="judul" id="judul">
                </div>
                <div style="padding: 10px;">
                  <input type="text" required style="border-radius: 15px; width: 100%; outline: none; padding: 5px 10px; text-align: center;" placeholder="HARGA" name="harga" id="harga">
                </div>
                <div style="padding: 10px; float: right;">
                  <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
    </script>

<!-- this will populate the modal form with the MongoDb field that we want to update  -->
    <script>
       $('#editModal').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var kode = button.data('kode')
        var judul = button.data('judul')
        var harga = button.data('harga')
        var modal = $(this)

        modal.find('.modal-body #kode').val(kode)
        modal.find('.modal-body #formupdate').attr('action',"/update/"+kode)
        modal.find('.modal-body #judul').val(judul)
        modal.find('.modal-body #harga').val(harga)
      })
  </script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>

