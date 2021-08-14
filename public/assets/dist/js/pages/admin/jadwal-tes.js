$('#datetimepicker1').datetimepicker({
    format: 'HH:mm'
});

$('#dropdown-pelamar a').on("click", function(){
    $('#btn-pelamar').html($(this).html());
    $('#pelamar').val($(this).attr('id'));
});

$('#dropdown-jenis-interview a').on("click", function(){
    $('#btn-jenis-interview').html($(this).html());
    $('#jenis-interview').val($(this).attr('id'));
});

$('#cb-jabatan').on("click", function(){
    if($(this)[0].checked){
        $('#jabatan-tujuan')[0].disabled = false;
    }
    else{
        $('#jabatan-tujuan')[0].disabled = true;
    }
})

$('#dropdown-pegawai a').on("click", function(){
    $('#btn-pegawai').html($(this).html());
    $('#pegawai').val($(this).attr('id'));
});

$('#dropdown-unitkerja a').on("click", function(){
    $('#btn-unitkerja').html($(this).html());
    $('#unitkerja').val($(this).attr('id'));
});

$('#group-radio div input').on("click", function(){
    if($(this)[0].id == "customRadio3"){
        $('#waktu-kontrak')[0].disabled = false;
        $('#tipe').val(3);
    }
    else if($(this)[0].id == "customRadio2"){
        $('#waktu-kontrak')[0].disabled = true;
        $('#tipe').val(2);
    }
    else if($(this)[0].id == "customRadio1"){
        $('#waktu-kontrak')[0].disabled = true;
        $('#tipe').val(1);
    }
})