<?php

$hostname = "localhost";
$username = "master";
$password = "145819";
$database = "painel_gtc";

$id_linha = $_POST['id_linha'];

$conn = mysqli_connect($hostname, $username, $password ,$database);
//consulta datas;  
//select que recebe os parametros da funcao
 /*   $sql = "SELECT 
                id
                ,nome
            FROM gtc_linhas_variacao
            WHERE id_linha='$num_linha'
            ";
    $result = $conn->query($sql);
*/
?>

<select id="id_variacao" class="selectpicker form-control show-tick">
    <option value="">Selecione a Variação...</option>
        <?php                              
            $sql = "SELECT 
                        id
                        ,nome
                    FROM 
                        gtc_linhas_variacao
                    WHERE 
                        id_linha='$id_linha'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo '<option id="id_variacao" onChange="insereVariacao()" value="'.$row['id'].'">'.$row['nome'].'</option>';
                } 
            }
        ?>
</select>
