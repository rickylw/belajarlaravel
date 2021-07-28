$(function(){
    $('#dropdown-jenis-kelamin a').on("click", function(){
        $('#btn-jenis-kelamin').html($(this).html());
        $('#jenis-kelamin').val($(this).html());
    });
})