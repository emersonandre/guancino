<?php

include '../bd/conecta.php';

$Numerolinha= $_POST['Nlinha'];
$Linha = $_POST['Linha'];
$obs = $_POST['obs'];

// Create connection
// Check connection
//$result = $result = mysqli_query($conn,"select id from gtc_linhas where numero ='$Numerolinha'");
// if(mysqli_num_rows ($result) > 0 ) { 
//echo "<script> alert('Linha Ja existe');</script>";
//}else{
    $sql = "INSERT INTO gtc_linhas (numero,nome,obs) VALUES ('$Numerolinha','$Linha','$obs')";
    if (mysqli_query($conn, $sql)) {
       return ('echo "New record created successfully"');
     } else {
         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }

mysqli_close($conn);
?>

