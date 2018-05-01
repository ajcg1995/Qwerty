
function TrazarRutaMapa(){
    
    
   $.ajax({
        type: 'POST',
        url: '../control/ControlAjaxRutas.php?idRuta=2',
        success: function (response) {  
            console.log(response);

        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        if (jqXHR.status === 0) {

            alert('No nos pudimos Conectar con el sevidor Verifique su conexion a Internet ');

        } else if (jqXHR.status == 404) {

            alert('Error [404] No se encontro el Archivo');

        } else if (jqXHR.status == 500) {

            alert('Error de conexion con el servidor');

        }

    });;  
}


