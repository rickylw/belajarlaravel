<html>
<head>
<title>Mutasi Pegawai</title>
</head>
<style>
@page {
margin:10px;
}
body {
margin: 10px;
}
table {
border-collapse: collapse; width: 100%;
}

table tr th {
border: 1px solid black; background: #c5c5c5; padding: 5px;
}

table tr td {
border: 1px solid black; padding: 5px;
}

</style>
<body>
<h1> align="center">Mutasi Pegawai</h1>
<br>
<table>
<thead>
<tr>
<th width="20">No</th>
<th>Nama</th>
<th>Jabatan</th>
<th>Pekerjaan</th>
<th>Mutasi Tujuan</th>
<th>Deskripsi Mutasi Pegawai</th>
<th>Email</th>
<th>Hp</th>
<th>Hari</th>
<th>Tanggal</th>
</tr>
</thead>
<tbody>
    <?php $no=1;?>
    
    @foreach($data as $item)
    <tr>
    <td> align="center">
    {{ $no }}
    </td>
    <td>
        {{ $item->nama }}
    </td>
    <td>
        {{ $item->jabatan }}
    </td>
    <td>
        {{ $item->pekerjaan }}
    </td>
    <td>
        {{ $item->mutasitujuan }}
    </td>
    <td>
        {{ $item->deskripsimutasipegawai }}
    </td>
    <td>
        {{ $item->email }}
    </td>
    <td>
        {{ $item->hp }}
    </td>
    <td>
        {{ $item->hari }}
    </td>
    <td>
        {{ $item->tanggal }}
    </td>
    <td>
    </tr>
    <?php $no++;?> @endforeach
    
    </tbody>
    </table>
    </body>
    </html>