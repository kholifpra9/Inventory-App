<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { font-size: 24px; font-weight: bold; text-align: center; }
        .table { width: 100%; border-collapse: collapse; }
        .table-bordered { border: 1px solid black; }
        .table-bordered th, .table-bordered td { border: 1px solid black; padding: 8px; text-align: left; }
        .table-bordered th { background-color: #f2f2f2; font-weight: bold; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>{{ $date }}</p>
    <p>Inventory Barang Masuk.</p>
  
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Pemohon</th>
        </tr>
        @foreach($barang as $barang)
        <tr>
            <td>{{ $barang->id }}</td>
            <td>{{ $barang->barang->nama_barang }}</td>
            <td>{{ $barang->jml_barang_permintaan }}</td>
            <td>{{ $barang->keterangan }}</td>
            <td>{{ $barang->status }}</td>
            <td>{{ $barang->user->name }}</td>
        </tr>
        @endforeach
    </table>
  
</body>
</html>
