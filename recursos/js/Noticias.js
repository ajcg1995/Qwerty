function ajaxAgregarNoticiaRuta(){
    
    var idRuta = $('#idRuta').html();
    var descNoticia = $('#descripcionNoticia').val();
    var fechaNoticia = $('#fechaNoticia').val();
    
    $.ajax({
        data: {
            'idRuta': idRuta,
            'descNoticia':descNoticia,
            'fechaNoticia': fechaNoticia
        },
        type: 'POST',
        url: '../control/SolicitudAjaxNoticias.php',
        
        success: function (response){
            if (response != -1) {
                    $("#tablaRutas").html(response);
                    $("#ModalAgregarNoticias").modal('hide');
                } else {
                    notificacion("Ha ocurrido un error al insertar el rol");
                    $("#ModalAgregarNoticias").modal('hide');
                }
            
        }
    })
    
}
