<?php
$hostname = "localhost";
$username = "master";
$password = "145819";
$database = "painel_gtc";

$num_linha = $_POST['num_linha'];
$id_variacao = $_POST['id_variacao'];
$horario = $_POST['horario'];
$radio1 = $_POST['radio1'];
    if($radio1 == 'true'){
        $radio1 = '1';
    }else{
        $radio1 = '0';
    }
$radio2 = $_POST['radio2'];
    if($radio2 == 'true'){
        $radio2 = '1';
    }else{
        $radio2 = '0';
    }
$radio3 = $_POST['radio3'];
    if($radio3 == 'true'){
        $radio3 = '1';
    }else{
        $radio3 = '0';
    }
$radio4 = $_POST['radio4'];
    if($radio4 == 'true'){
        $radio4 = '1';
    }else{
        $radio4 = '0';
    }
$radio5 = $_POST['radio5'];
    if($radio5 == 'true'){
        $radio5 = '1';
    }else{
        $radio5 = '0';
    }
$radio6 = $_POST['radio6'];
    if($radio6 == 'true'){
        $radio6 = '1';
    }else{
        $radio6 = '0';
    }
$radio7 = $_POST['radio7'];
if($radio7 == 'true'){
        $radio7 = '1';
    }else{
        $radio7 = '0';
    }

$conn = mysqli_connect($hostname, $username, $password ,$database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    //inicio das condiçoes de query
    if($num_linha != "" and $horario  != ""){ //verifica se todos os dados obrigatorios foram preenchidos
        $consulta_query = "SELECT * FROM gtc_horarios WHERE id_linha='$num_linha' and horario='$horario'";
        //executa a query de consulta para linha e horario;
        $result_query = mysqli_query($conn,$consulta_query);
        if(mysqli_num_rows ($result_query) > 0 ) {  // retorno da consulta de horario e linha;
             header("HTTP/1.0 500 Linha e Horario ja existem!");
        }else{ // inicia query para gravar no banco
            $sql = "INSERT INTO gtc_horarios (id_linha,id_variacao,horario,segunda,terca,quarta,quinta,sexta,sabado,domingo) 
                VALUES ('$num_linha','$id_variacao','$horario','$radio1','$radio2','$radio3','$radio4','$radio5','$radio6','$radio7')";
            if (mysqli_query($conn, $sql)) {
                echo "New record created successfully";
            }else{
              header("HTTP/1.0 401");
              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
    }else{
        header("HTTP/1.0 400 Por Favor Preencha todos os Dados Corretamente!");
    //echo "<script> alert('Por Favor Preencha todos os Dados Corretamente!'); </script>";
    }  
}//fim do else !$conn

mysqli_close($conn);//encera conexao com o banco
?>
