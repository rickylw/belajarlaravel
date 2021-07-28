<html>
<head>
<title>Data Pegawai</title>
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
        <h1> align="center">Data Pegawai</h1>
            <br>
            <table>
            <thead>
                    <tr>
                        <th width="20">No</th>
                        <th>Name</th>
                        <th>Alamat</th>
                        <th>tempatlahir</th>
                        <th>tanggal_lahir</th>
                        <th>Pendidikan</th>
                        <th>Program Studi</th>
                        <th>Tahunkelulusan</th>
                        <th>Jabatan</th>
                        <th>Tanggal SK</th>
                        <th>Foto</th>
                        <th>Email</th>
                        <th>Hp</th>
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
        {{ $item->name }}
    </td>
    <td>
        {{ $item->alamat }}
    </td>
    <td>
        {{ $item->tempatlahir }}
    </td>
    <td>
        {{ $item->tanggal_lahir }}
    </td>
    <td>
        {{ $item->pendidikan }}
    </td>
    <td>
        {{ $item->programstudi }}
    </td>
    <td>
        {{ $item->tahunkelulusan }}
    </td>
    <td>
        {{ $item->jabatan }}
    </td>
    <td>
        {{ $item->tanggalsk }}
    </td>
    <td>
        {{ $item->foto }}
    </td>
    <td>
        {{ $item->email }}
    </td>
    <td>
        {{ $item->hp }}
    </td>
    </tr>
    <?php $no++;?> @endforeach
    
    </tbody>
    </table>
    </body>
    </html>