<?php

if(!isset($_SESSION)) {
    session_start();
}

// function verificaAcesso(){
 
//         if(!isset($_SESSION['id'])){
//         session_destroy();
//         header("location:../login.php?acesso_negado");
//         exit;
//     }
// }

function login($id, $nome){
    $_SESSION['id'] = $id;
    $_SESSION['nome'] = $nome;
}

function logout(){
    session_destroy();
    header("location:../login.php?saiu");
    exit;
}