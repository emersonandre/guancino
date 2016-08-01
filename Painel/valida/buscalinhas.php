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

