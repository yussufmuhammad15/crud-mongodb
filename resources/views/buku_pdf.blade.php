<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
	<center>
		LAPORAN PDF TUTORIAL MONGODB
	</center>
 
    <div class="container" style="padding: 20px;">

    <table id="table_id" style="border:none;" class="table table-hover">
      <thead>
        <tr>
          <th style="width: 50px; text-align: center;" scope="col">No</th>
          <th style="width: 100px;" scope="col">kode</th>
          <th scope="col">Judul</th>
          <th style="width: 150px;" scope="col">Harga</th>
        </tr>
      </thead>
      <tbody>
        @php
          $no = 1
        @endphp
        @foreach ($buku as $key => $value) 

        <tr style="text-align: center;">
          <th style="text-align: center;" scope="row">{{$no++}}</th>
          <td>{{$value->kode}}</td>
          <td>{{$value->judul}}</td>
          <td>{{$value->harga}}</td>
        </tr>
        @endforeach

      </tbody>
    </table>
      
    </div>
 


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>