<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor. &callback=initMap
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
          <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBBqvWebwOCDVsT_eAEtZzXakPKuIsRXOE&callback=inicializar"
  type="text/javascript"></script>
  <script src="../recursos/bootstrap/js/jquery1.12.4.js" type="text/javascript"></script>
        <script  type="text/javascript">
//inicializar();
            
            function inicializar(){
               // alert("Entro");
                var lat = 10.0000000;
                var log = -84.0000000;
                
                var gLatLog = new google.maps.LatLng(lat,log);
                var objConfiguracion = {
                    zoom: 5,
                    center: gLatLog
                };
                
                var gMap = new google.maps.Map(document.getElementById('divContieneMapa') ,objConfiguracion);
              var   objConfigMarker = {
                    position:gLatLog,
                    map:gMap,
                    title:"Hola Mundo"
                };
                var gMarker = new google.maps.Marker(objConfigMarker);
                
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
            }

        </script>
    </head>

    <body> 
        <div id="divContieneMapa" style="width: 500px; height: 400px;margin: auto">
            Aqui va mapa
        </div>
        <?php
        // https://www.phpcentral.com/pregunta/231/aporte-geolocalizacion-de-usuario-w3c
        //https://www.phpcentral.com/pregunta/630/leer-coordenadas-y-trazar-ruta-en-google-maps
        //<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d15720.509971110643!2d-84.1382365!3d9.9233386!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2scr!4v1525150969450" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
        ?>
    </body>
</html>
