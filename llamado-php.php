<?php

    /**
     * Este php me permite usar el poder del php con un ejemplo de la tecnología AngularJS...
     * incluso desde el administrador de este sitio.
     */

    if( isset( $_GET[ 'cadena' ] ) )
    {     
        include( "config.php" );
        
        /*Esta conexión se realiza para la prueba con angularjs*/
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        //echo $ope;
        /*$conn = new mysqli( $servidor, $usuario, $clave, $base_de_datos );
        
        //Se busca principalmente por alias.
        $sql  = " SELECT * FROM tb_usuarios  ";
        $sql .= " WHERE alias LIKE '%".$_GET[ 'cadena' ]."%'  ";
        $sql .= " ORDER BY fecha_registro DESC LIMIT 10 ";
        
        //LA tabla que se cree debe tener la tabla aquí requerida, y los campos requeridos abajo.
        $result = $conn->query( $sql );
        
        $outp = "";
        
        while($rs = $result->fetch_array( MYSQLI_ASSOC )) 
        {
            //Mucho cuidado con esta sintaxis, hay una gran probabilidad de fallo con cualquier elemento que falte.
            if ($outp != "") {$outp .= ",";}
            $outp .= '{"Alias":"'.$rs["alias"].'",';            // <-- La tabla MySQL debe tener este campo.
            $outp .= '"Nombres":"'.$rs["nombres"].'",';         // <-- La tabla MySQL debe tener este campo.
            $outp .= '"Documento":"'.$rs["documento"].'",'; 
            $outp .= '"Apellidos":"'.$rs["apellidos"].'"}';     // <-- La tabla MySQL debe tener este campo.
        }
        $outp ='{"records":['.$outp.']}';*/
        $name = $_GET['cadena'];
        $contenido = $_GET['cadena1'];
        $salida ="";
        $archivo = fopen($name.".txt",'a');
        fputs($archivo,$contenido);
        fclose($archivo);
        
        $salida="";
        $carpeta = 'C:\xampp\htdocs\ec\codigojs_limpio-git\Consulta_js-bd';
            if(is_dir($carpeta)){
                if($dir = opendir($carpeta)){
                    while(($archivo = readdir($dir)) !== false){
                        if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                            if ($salida != "") {$salida .= ",";}
                            $salida.= '{"Archivo" : "'.$archivo.'"}';
                        }
                    }
                    closedir($dir);
                }
            }
        
         
        

        /*$fp = fopen("fichero.txt", "w");
        fputs($fp, "Prueba de escritura aprenderaprogramar.com");
        fclose($fp);*/

        $salida = '{"records":['.$salida.' ]}';
        //$conn->close();
        echo $salida;
        //echo($outp);
    
    }
?> 