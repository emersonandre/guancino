<?php 
session_set_cookie_params(3600);
session_start();
    if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
    {
        header('location:./login/index.html');
    }
    $id_user = $_SESSION['id'];
    $logado = $_SESSION['login'];
    $acesso = $_SESSION['acesso']; 
?>
<?php

$hostname = "localhost";
$username = "master";
$password = "145819";
$database = "painel_gtc";

$conn = mysqli_connect($hostname, $username, $password ,$database);
//consulta datas;  
//select que recebe os parametros da funcao
    $sql = "SELECT 
                id
                ,nome
            FROM gtc_linhas
            WHERE 1
            ";
    $result = $conn->query($sql);

?>

