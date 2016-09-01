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


$id= $_POST['id'];

//script para deletar a linha selecionada
$sqlVerificaLinha="SELECT * FROM gtc_linhas WHERe id='$id'";
$sqlLinha= "DELETE FROM gtc_linhas WHERE id='$id'";

//script para deletar a variacao da linha selecionada
$sqlVerificaVariacao="SELECT * FROM gtc_linhas_variacao WHERE id_linha='$id'";
$sqlVariacao = "DELETE FROM gtc_linhas_variacao WHERE id_linha='$id'";

//script para deletar os horarios da linha e variacao deletadas
$sqlVerificaHorario="SELECT * FROM gtchorarios WHERE id_linha='$id'";
$sqlHorario = "DELETE FROM gtc_horarios WHERE id_linha='$id'";

//verifica se existe linha cadastrada e exclui ou retorna status code error.
$VerificaLinha = $conn->query($sqlVerificaLinha);
if ($VerificaLinha->num_rows > 0) {
    if(mysqli_query($conn, $sqlLinha)){
        echo "New record created successfully";
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        header("HTTP/1.0 411");
    }
    //verifica se existe variacao cadastrada e exclui ou retorna status code error.
    $VerificaVariacao = $conn->query($sqlVerificaVariacao);
    if ($VerificaVariacao->num_rows > 0) {
         if(mysqli_query($conn, $sqlVariacao)){
            echo "New record created successfully";  
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            header("HTTP/1.0 412");
        }
    }else{
        header("HTTP/1.0 512");
    }

    //verifica se existe horarios cadastrado e exclui ou retorna um status code error.
    $VerificaHorario = $conn->query($sqlVerificaHorario);
    if ($VerificaHorario->num_rows > 0) {
        if (mysqli_query($conn, $sqlHorarios)) {
            echo "New record created successfully";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            header("HTTP/1.0 413");
        }
    }else{
        header("HTTP/1.0 513");
    }

}else{
    header("HTTP/1.0 511");
}


//insera conexao com o banco
mysqli_close($conn);