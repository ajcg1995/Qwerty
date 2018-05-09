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
                    $("#tablaNoticias").html(response);
                    $("#ModalAgregarNoticias").modal('hide');
                } else {
                    notificacion("Ha ocurrido un error al insertar el rol");
                    $("#ModalAgregarNoticias").modal('hide');
                }
            
        }
    });
    
}


function ajaxModificarNoticia(){
    var idRutaM = $('#idRutaM').html();
    var idNoticiaM =  $('#idNoticiaM').html();
    var fechaNoticiaM = $('#fechaNoticiaM').val();
    var descripcionM = $('#descripcionNoticiaM').val();
    
    $.ajax({
        data:{
            'idRutaM' : idRutaM,
            'idNoticiaM' :  idNoticiaM,
            'fechaNoticiaM' : fechaNoticiaM,
            'descripcionM' : descripcionM            
        },
        type: 'POST',
        url: '../control/SolicitudAjaxNoticias.php',
        
        success: function (response){
            if (response != -1) {
                    $("#tablaNoticias").html(response);
                    $("#ModalModificarNoticias").modal('hide');
                } else {
                    notificacion("Ha ocurrido un error al insertar el rol");
                    $("#ModalModificarNoticias").modal('hide');
                }
            
        }
    });
}

function ajaxEliminarNoticia(idNoticiaE){
    $.ajax({    
        data:{
            
            'idNoticiaE' :  idNoticiaE,                   
        },
        type: 'POST',
        url: '../control/SolicitudAjaxNoticias.php',
        
        success: function (response){
            $('#tablaNoticias').html(response);
        }
    });
    
    
}
