$('#dropdown-penerima a').on("click", function(){
    $('#btn-penerima').html($(this).html());
    $('#penerima').val($(this).attr('id'));
});