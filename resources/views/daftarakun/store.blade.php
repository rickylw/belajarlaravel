<html>
<head>
<title>Data Pendaftaran Akun</title>
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
<h1> align="center">Data Pendaftaran Akun</h1>
<br>
<table>
<thead>
<tr>
<th width="20">No</th>
<th>Name</th>
<th>Role</th>
<th>Email</th>
<th>Password</th>
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
    {{ $item->role }}
    </td>
    <td>
    {{ $item->email }}
    </td>
    <td>
    {{ $item->password }}
    </td>
    </tr>
    <?php $no++;?> @endforeach
    
    </tbody>
    </table>
    </body>
    </html>