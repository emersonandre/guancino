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

include '../../Painel/bd/conecta.php';

$id_horario = $_POST['id'];

$sql = "DELETE FROM gtc_horarios WHERE id='$id_horario'";

if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
   }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


mysqli_close($conn);
?>