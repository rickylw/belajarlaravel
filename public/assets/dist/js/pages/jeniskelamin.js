$(function(){
    $('#dropdown-jenis-kelamin a').on("click", function(){
        $('#btn-jenis-kelamin').html($(this).html());
        $('#jenis-kelamin').val($(this).html());
    });

    $('#dropdown-jenis-pekerjaan a').on("click", function(){
        $('#btn-jenis-pekerjaan').html($(this).html());
        $('#jenis-pekerjaan').val($(this).html());
    });
})