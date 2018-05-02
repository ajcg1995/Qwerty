var gMap;
var gMarker;
var markers={};
function Inicializar(){
               // alert("Entro");
                var lat = 10.0000000;
                var log = -84.0000000;
                
                var gLatLog = new google.maps.LatLng(lat,log);
                var objConfiguracion = {
                    zoom: 5,
                    center: gLatLog
                };
                
                 gMap = new google.maps.Map(document.getElementById('divContieneMapa') ,objConfiguracion);
              /*var   objConfigMarker = {
                    position:gLatLog,
                    map:gMap,
                    title:"Hola Mundo"
                };
                var gMarker = new google.maps.Marker(objConfigMarker);
                */
                var gCoder = new google.maps.Geocoder();//Traduce una direccion en una cordenada
                var objInformacion={
                    address:'San Roque'
                };
                gCoder.geocode(objInformacion,fn_coder);
                
                function fn_coder(data){
                  var coordenadas =   data[0].geometry.location;//objeto de tipo LantLog
                    var   objConfigMarkers2 = {
                    position:coordenadas,
                    map:gMap,
                    title:"Hola Mundo"
                };
                var gMarker2 = new google.maps.Marker(objConfigMarkers2);
               // gMarker2.setIcon('../recursos/img/qwertylogo.png');
                    
                }
                baseData();
            }
            
            
function TrazarRutaMapa(){   
   $.ajax({     
        url: '../control/ControlAjaxRutas.php?idRuta=2',
        success: function (response) { 
         var json = JSON.parse(response);
         var flightPlanCoordinates  = new Array();
           $.each(json, function (i,item){
              flightPlanCoordinates.push(new google.maps.LatLng(item["lat"],item["lng"]));
           });

       var flightPath = new google.maps.Polyline({
        path: flightPlanCoordinates,
        geodesic: true,
        strokeColor: '#FF0000',
        strokeOpacity: 1.0,
        strokeWeight: 3,
         zoom: 20
      });

                 var objConfiguracion = {
                    zoom: 20
                };
                
                // gMap = new google.maps.Map(document.getElementById('divContieneMapa') ,objConfiguracion);
      
       flightPath.setMap(gMap);
       
       

           // console.log(concat);
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

function baseData() {
                var config = {
                apiKey: "AIzaSyBBqvWebwOCDVsT_eAEtZzXakPKuIsRXOE",
                authDomain: "transporte-qwertycr.firebaseapp.com",
                databaseURL: "https://transporte-qwertycr.firebaseio.com",
                projectId: "transporte-qwertycr",
                storageBucket: "transporte-qwertycr.appspot.com",
                messagingSenderId: "375778182032"
            };
            firebase.initializeApp(config);

                var ref = firebase.database().ref("transporte").child("1");
                ref.on("child_added", function (sn) {
                    var gLatLog = new google.maps.LatLng(sn.val()['lat'],sn.val()['lon']);
                    ColocarMarker(gLatLog,sn.key);
                });


                ref.on("child_changed", function (sn) {
                   var gLatLog = new google.maps.LatLng(sn.val()['lat'],sn.val()['lon']);
                    ActualizarMarker(sn.key,gLatLog);
                   // console.log(sn.val()['lat']);
                });
            }
            function ColocarMarker(gLatLog,name) {
              var   objConfigMarker = {
                    id:name,
                    position:gLatLog,
                    map:gMap,
                    title:name
                };
               
               gMarker = new google.maps.Marker(objConfigMarker);
                markers[name]=gMarker;
            }
            function ActualizarMarker(id,gLatLog) {
                console.log(gMarker);
                if (markers[id]) {
                    markers[id].setMap(null);
                    delete markers[id];
        
    }
                
               // gMarker[id].setMap(null);
                //gMarker[id]
                //marker.setMap(null);
                 ColocarMarker(gLatLog,id);
            }




