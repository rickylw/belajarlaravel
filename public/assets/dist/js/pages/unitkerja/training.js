$('#datetimepicker1').datetimepicker({
    format: 'HH:mm'
});

$('#datetimepicker2').datetimepicker({
    format: 'HH:mm'
});

$('#dropdown-pegawai a').on("click", function(){
    $('#btn-pegawai').html($(this).html());
    $('#pegawai').val($(this).attr('id'));
});

$('#dropdown-unitkerja a').on("click", function(){
    $('#btn-unitkerja').html($(this).html());
    $('#unitkerja').val($(this).attr('id'));
});