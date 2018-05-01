function acceder(event) {
    var usuario = $('#usuario').val();
    var contrasena = $('#contrasena').val();
    $.ajax({
        data: {'usuario': usuario,
            contrasena: contrasena            
        },
        type: 'POST',
        url: '../control/ControlInicioSesion.php',
        success: function (response) {   
            if (response == "0") {
                  alert('Clave o usuario incorrecta'); 
                  
            }else if (response == "1"){
  
                window.location.href = "../vista/Administracion.php";
              
            }
        }
    });
}
