<?php


$servidor = "localhost";
$usuario = "id21693711_pastor";
$senha = "123Pastor@";
$banco = "plena_paz";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if( !$conexao ){
die("deu ruim".mysqli_connect_error());
}else{}

?>



