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