<?php


function tablaNoticias($idEmpresa) {
    $resultado = listarNoticias($idEmpresa);
   
        if ($resultado != null) {
           // if (mysqli_num_rows($resultado) > 0) {
            $concat = "";
                
            foreach ($resultado as $fila){
                $concat .= '<tr>'
                        . '<td>' . $fila->obtenerIdNoticia() . '</td>'
                        . '<td>' . $fila->obtenerIdRuta(). '</td>'
                        . '<td>' . $fila->obtenerFechaNoticias() . '</td>'
                        . '<td>' . $fila->obtenerDescripcionNoticias(). '</td>'
                        . '<td><button onclick="abrirModalModificarNoticia(this)" class ="btn btn-warning"><i class = "glyphicon glyphicon-pencil"></i></button></td>'
                        . '<td><button onclick="ajaxEliminarNoticia('.$fila->obtenerIdNoticia().')" class ="btn btn-danger"><i class = "glyphicon glyphicon-minus"></i></button></td>'

                        . '</tr>';
                
            }
            
            
            echo $concat;
            }
            echo 'No hay datos que mostrar';
        
        }