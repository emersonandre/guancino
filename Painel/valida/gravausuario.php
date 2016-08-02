<?php
include '../bd/conecta.php';

$user_nome = $_POST['user-nome'];
$user_usuario = $_POST['user-usuario'];
$user_senha = $_POST['user-senha'];
$user_repsenha = $_POST['user-repsenha'];
$user_nivel = $_POST['user-nivel'];

if($user_senha == $user_repsenha){   
    if($user_nome !="" && $user_usuario !="" && $user_senha != ""){
        $consulta_query = "SELECT id,usuario FROM gtc_usuario WHERE usuario = '$user_usuario'";
        $result_query = mysqli_query($conn,$consulta_query);
        if(mysqli_num_rows ($result_query) > 0 ) {  // retorno da consulta de horario e linha;
             header("HTTP/1.0 409 Usuario ja esta cadastrado!");
        }else{ // inicia query para gravar no banco
            $query = "INSERT INTO gtc_usuario(nome,usuario,senha,flag) 
                    VALUES('$user_nome','$user_usuario','$user_senha','$user_nivel')";
            if (mysqli_query($conn, $query)) {
                echo "New record created successfully";
            }else{
              header("HTTP/1.0 500");
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }else{
        header("HTTP/1.0 402 Campos Obrigatorios não preenchidos!");
    }
}else{
   header("HTTP/1.0 401 Senhas Digitadas não Conferem!");
}

