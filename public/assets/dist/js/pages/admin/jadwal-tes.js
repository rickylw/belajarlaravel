$('#datetimepicker1').datetimepicker({
    format: 'HH:mm'
});

$('#dropdown-pelamar a').on("click", function(){
    $('#btn-pelamar').html($(this).html());
    $('#pelamar').val($(this).attr('id'));
});