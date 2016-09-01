<?php 
session_set_cookie_params(3600);
session_start();
    if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
    {
        header('location:../../Painel/login/index.html');
    }
    $id_user = $_SESSION['id'];
    $logado = $_SESSION['login'];
    $acesso = $_SESSION['acesso']; 

include '../Painel/bd/conecta.php';

//select que recebe os parametros da funcao
    $sql = "SELECT 
                id
                ,nome
            FROM gtc_linhas
            WHERE 1
            ";
    $result = $conn->query($sql);

?>

