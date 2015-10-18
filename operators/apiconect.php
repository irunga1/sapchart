<?php 
require_once("../class/conection.php");
require_once("../class/api.php");


$obj = new Api("mysql","localhost","root","","galileosupermercado");
$obj->querySend("articulo","nombre,precioCosto","");
$obj->convertJson();
$obj->printJson();



?>

