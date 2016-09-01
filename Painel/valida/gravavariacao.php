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
?>
<?php

include '../../Painel/bd/conecta.php';

$id_linha= $_POST['id_linha'];
$variacao = $_POST['variacao'];
$obs_variacao = $_POST['obs_variacao'];

// Create connection
// Check connection
//$result = $result = mysqli_query($conn,"select id from gtc_linhas where numero ='$Numerolinha'");
// if(mysqli_num_rows ($result) > 0 ) { 
//echo "<script> alert('Linha Ja existe');</script>";
//}else{
    $sql = "INSERT INTO gtc_linhas_variacao (id_linha,nome,obs) VALUES ('$id_linha','$variacao','$obs_variacao')";
    if (mysqli_query($conn, $sql)) {
       return ('echo "New record created successfully"');
     } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }

mysqli_close($conn);
?>