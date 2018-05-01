function abrirTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}


function agregarRol() {
    var bandera = 0;
    var valor = $('#inputAgregarRol').val();
    var val = validacionExpRegular(valor);
    if (val == 'false' || valor == null || valor.length == 0) {
        var mensaje = "El rol que desea agregar no es válido";
        notificacion(mensaje);
        bandera = 1;
    }
//    else {
//        $("#comboRoles option").each(function () {
//            if (valor == $(this).text()) {
//                bandera = 1;
//             $("#notificacion").val("El rol que desea agregar no es válido");
//            }
//        });
    if (bandera == 0) {
        $.ajax({
            data: {'agregarRol': valor
            },
            type: 'POST',
            url: '../control/SolicitudAjaxAdministracion.php',
            success: function (response) {
                if (response != -1) {
                    $("#tablaRoles").html(response);
                    $("#modalAgregarRol").modal('hide');
                } else {
                    notificacion("Ha ocurrido un error al insertar el rol");
                    $("#modalAgregarRol").modal('hide');
                }
                //   response
            }
        });
    }
    //}
}

var rolAEliminar = null;
function eliminarRol(event) {
    rolAEliminar = event.value;
    $("#inputEliminarRol").text("¿Desea eliminar el rol con id: " + rolAEliminar + "?");
    $("#modalEliminarRol").modal('show');
}

function eliminarRolAjax() {
    if (rolAEliminar != null) {
        $.ajax({
            data: {'eliminarRol': rolAEliminar
            },
            type: 'POST',
            url: '../control/SolicitudAjaxAdministracion.php',
            success: function (response) {
                if (response != -1) {
                    $("#tablaRoles").html(response);
                    $("#modalEliminarRol").modal('hide');
                } else {
                    notificacion("Ha ocurrido un error al eliminar el rol");
                    $("#modalEliminarRol").modal('hide');
                }
            }
        });
    }


}


function validacionExpRegular(expresion) {
    var exp = /^[a-zA-Z0-9À-ÿ\u00f1\u00d1\s]+$/g;
    return (exp.test(expresion)) ? 'true' : 'false';
}

// <editor-fold defaultstate="collapsed" desc="NOTIFICACIONES">
function notificacion(mensaje) {
    $("#notificacion").empty();
    // $("#notificacion").append('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
    $("#notificacion").append("</br><p>" + mensaje + "</p>");
    $("#notificacion").css("display", "block");
    setTimeout(function () {
        $(".content").fadeOut(1500);
    }, 3000);
}

// </editor-fold>