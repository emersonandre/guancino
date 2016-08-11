<?php

include 'conecta.php';

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