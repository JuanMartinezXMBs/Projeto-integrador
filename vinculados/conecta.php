<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "projeto_integrador";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

mysqli_set_charset($conexao, "utf8");

if( !$conexao ){
    die("deu ruim".mysqli_connect_error());
}else{} 






