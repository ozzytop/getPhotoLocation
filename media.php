<?php
require('class/Photo.php');

define('clientId','dd79969587be46d1b22c61ff3e037719');

$location=new Photo(clientId);

if(isset($_GET['id']))
{
    $id= $_GET['id'];
    $datos=$location->getMediaId($id,clientId);
    if($datos['meta']['code']==400)
    {
        $resultadoEstado= json_encode($datos['meta']);
        print_r($resultadoEstado);
    }else 
    {
        $resultadoEstado= json_encode($datos['meta']);
        $resultadoDatos=json_encode($datos['data']['location']);        
        print_r($resultadoEstado);
        print_r($resultadoDatos);        
    }
}elseif(isset($_GET['shortcode'])) 
{   
    $shortcode= $_GET['shortcode'];
    $datos=$location->getShortcode($shortcode,clientId);
    if($datos['meta']['code']==400)
    {
        $resultadoEstado= json_encode($datos['meta']);
        print_r($resultadoEstado);
    }else 
    {
        $resultadoEstado= json_encode($datos['meta']);
        $resultadoDatos=json_encode($datos['data']['location']);        
        print_r($resultadoEstado);
        print_r($resultadoDatos);        
    }
    
}else
{
    $error='{"status" : 400 , "error_type" : "invalid parameters"}';
    print_r($error);
}
?>  

