function cerrarSesion(){
   var cerrar = 1;
    $.ajax({
        data: {'cerrarSesion': cerrar},
        type: 'POST',
        url: '../control/ControlInicioSesion.php',
        success: function (response) {     
            if(response == "1"){
            window.location.href = "../vista/InicioSesion.php";}
       }
    });    
}
