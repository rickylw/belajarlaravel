<html>
<head>
<title>Data Pelamar</title>
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
<h1> align="center">Data Pelamar</h1>
<br>
<table>
<thead>
<tr>
<th width="20">pi</th>
<th>Nama</th>
<th>Tempat Tanggal Lahir</th>
<th>Usia</th>
<th>Jenis Kelamin</th>
<th>Email</th>
<th>No Handphone</th>
<th>Akun Media Sosial</th>
<th>Pendidikan Terakhir</th>
<th>Nama Instansi</th>
<th>Tahun Masuk</th>
<th>Tahun Lulus</th>
<th>Penghargaan</th>
<th>Nama Perusahaan</th>
<th>Posisi</th>
<th>Identitas Atasan</th>
<th>Gaji Terakhir</th>
<th>Jenis Pekerjaan</th>
<th>Keahlian Utama</th>
<th>Fotocopy Kartu Keluarga</th>
<th>Fotocopy KTP</th>
<th>Fotocopy Ijazah</th>
<th>Transkrip Nilai</th>
<th>Foto</th>
<th>SKCK</th>
<th>Surat Keterangan Sehat</th>
<th>Sertifikat</th>
<th>Surat Keterangan Pengalaman Kerja</th>
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
    {{ $item->pi }}
    </td>
    <td>
        {{ $item->nama }}
        </td>
    <td>
    {{ $item->ttl }}
    </td>
    <td>
        {{ $item->usia }}
        </td>
        <td>
            {{ $item->jk }}
            </td>
            <td>
                {{ $item->email }}
                </td>
                <td>
                    {{ $item->hp }}
                    </td>
                    <td>
                        {{ $item->medsos }}
                        </td>
                        <td>
                            {{ $item->pendidikan_terakhir }}
                            </td>
                            <td>
                                {{ $item->nama_instansi }}
                                </td>
                                <td>
                                    {{ $item->tahun_masuk }}
                                    </td>
                                    <td>
                                        {{ $item->tahun_lulus }}
                                        </td>
                                        <td>
                                            {{ $item->penghargaan }}
                                            </td>
                                            <td>
                                                {{ $item->nama_perusahaan }}
                                                </td>
                                                <td>
                                                    {{ $item->posisi }}
                                                    </td>
                                                    <td>
                                                        {{ $item->identitas_atasan }}
                                                        </td>
                                                        <td>
                                                            {{ $item->gaji_terakhir }}
                                                            </td>
                                                            <td>
                                                                {{ $item->jenis_pekerjaan }}
                                                                </td>
                                                                <td>
                                                                    {{ $item->keahlian_utama }}
                                                                    </td>
                                                                    <td>
                                                                        {{ $item->fc_kk }}
                                                                        </td>
                                                                        <td>
                                                                            {{ $item->fc_ktp }}
                                                                            </td>
                                                                            <td>
                                                                                {{ $item->fc_ijazah }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $item->transkrip_nilai }}
                                                                                    </td>
                                                                                    <td>
                                                                                        {{ $item->foto }}
                                                                                        </td>
                                                                                        <td>
                                                                                            {{ $item->skck }}
                                                                                            </td>
                                                                                            <td>
                                                                                                {{ $item->surat_keterangan_sehat }}
                                                                                                </td>
                                                                                                <td>
                                                                                                    {{ $item->sertifikat }}
                                                                                                    </td>
                                                                                                    <td>
                                                                                                        {{ $item->surat_keterangan_pengalaman_kerja }}
                                                                                                        </td>
    </tr>
    <?php $no++;?> @endforeach
    
    </tbody>
    </table>
    </body>
    </html>