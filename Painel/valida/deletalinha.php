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
include '../bd/conecta.php';


$id= $_POST['id'];
// Create connection
// Check connection
/*$result = $result = mysqli_query($con,"select id from gtc_linhas where numero ='$Numerolinha'");

    if(mysqli_num_rows ($result) > 0 ) { 
		echo "<script> alert('Linha Ja existe');</script>";
    }else{
        $sql = "INSERT INTO gtc_linhas (numero,nome,obs)
                VALUES ('$Numerolinha','$Linha','$obs')";

            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
		  mysqli_close($conn);
    }
*/
?>