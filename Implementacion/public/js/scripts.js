$(function() {
    $('.galeria .contenedor-img').on('click', function () {
        $('#modal').modal;
        var ruta_imagen=($(this).find('img').attr('src'));
        $('#imagen-modal').attr('src', ruta_imagen)
    });
    $('#modal').on('click',function name(params) {
        $('#modal').modal('hide');
    })
})