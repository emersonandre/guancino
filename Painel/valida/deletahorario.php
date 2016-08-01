<?php
include '../bd/conecta.php';

$id_horario = $_POST['id'];

$sql = "DELETE FROM gtc_horarios WHERE id='$id_horario'";

if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
   }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }


mysqli_close($conn);
?>