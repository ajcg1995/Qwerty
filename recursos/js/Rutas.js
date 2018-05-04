var gMap;
var gMarker;
var markers = {};
function Inicializar() {
    var lat = 10.0000000;
    var log = -84.0000000;
    var gLatLog = new google.maps.LatLng(lat, log);
    var objConfiguracion = {
        zoom: 8,
        center: gLatLog
    };
    gMap = new google.maps.Map(document.getElementById('divContieneMapa'), objConfiguracion);
    //baseData();
}


function TrazarRutaMapa() {
    // alert("entro"+$("#cboRutas").val())
    $.ajax({
        url: '../control/ControlAjaxRutas.php?idRuta=' + $("#cboRutas").val(),
        success: function (response) {
            console.log(response);
            var json = JSON.parse(response);
            var flightPlanCoordinates = new Array();
            $.each(json, function (i, item) {
                flightPlanCoordinates.push(new google.maps.LatLng(item["lat"], item["lng"]));
            });

            var flightPath = new google.maps.Polyline({
                path: flightPlanCoordinates,
                geodesic: true,
                strokeColor: '#FF0000',
                strokeOpacity: 1.0,
                strokeWeight: 3,
                zoom: 20
            });
            flightPath.setMap(gMap);
            baseData($("#cboRutas").val());
        }
    }).fail(function (jqXHR, textStatus, errorThrown) {
        if (jqXHR.status === 0) {

            alert('No nos pudimos Conectar con el sevidor Verifique su conexion a Internet ');

        } else if (jqXHR.status == 404) {

            alert('Error [404] No se encontro el Archivo');

        } else if (jqXHR.status == 500) {

            alert('Error de conexion con el servidor');

        }

    });
}

function baseData(idRuta) {
    //alert($("#cboRutas").val());
    var config = {
        apiKey: "AIzaSyBBqvWebwOCDVsT_eAEtZzXakPKuIsRXOE",
        authDomain: "transporte-qwertycr.firebaseapp.com",
        databaseURL: "https://transporte-qwertycr.firebaseio.com",
        projectId: "transporte-qwertycr",
        storageBucket: "transporte-qwertycr.appspot.com",
        messagingSenderId: "375778182032"
    };
    firebase.initializeApp(config);
    var ref = firebase.database().ref("transporte").child(idRuta);
    ref.on("child_added", function (sn) {
        var gLatLog = new google.maps.LatLng(sn.val()['lat'], sn.val()['lon']);
        ColocarMarker(gLatLog, sn.key);
    });


    ref.on("child_changed", function (sn) {
        var gLatLog = new google.maps.LatLng(sn.val()['lat'], sn.val()['lon']);
        ActualizarMarker(sn.key, gLatLog);
        // console.log(sn.val()['lat']);
    });
}
function ColocarMarker(gLatLog, name) {
    var objConfigMarker = {
        id: name,
        position: gLatLog,
        map: gMap,
        title: name
    };

    gMarker = new google.maps.Marker(objConfigMarker);
    markers[name] = gMarker;
}
function ActualizarMarker(id, gLatLog) {
    console.log(gMarker);
    if (markers[id]) {
        markers[id].setMap(null);
        delete markers[id];

    }

    // gMarker[id].setMap(null);
    //gMarker[id]
    //marker.setMap(null);
    ColocarMarker(gLatLog, id);
}

function llamarMapa(){
        window.location.href = "../vista/MapaTiempoReal.php";
    }
    
    
function abrirModalAgregarNoticia(evento){
  
    $('#ModalAgregarNoticias').modal('show');
    
    var idCodigo = $(evento).parents("tr").find("td").eq(1).html();
    var nombreRuta = $(evento).parents("tr").find("td").eq(0).html();
    $('#idRuta').html(idCodigo);
    $('#nombreRuta').html(nombreRuta);
   
}  