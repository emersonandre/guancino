<?php
$hostname = "localhost";
$username = "master";
$password = "145819";
$database = "painel_gtc";

$id_linha = $_POST['id_linha'];

$conn = mysqli_connect($hostname, $username, $password ,$database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else {
//resolve conexão com o banco!
//$con = new mysqli($host, $usuario, $senhabd, $banco) or die ("Sem conexão com o servidor");
//consulta datas;  
//select que recebe os parametros da funcao
    $sql = "SELECT 
                 vr.id
                 ,concat(li.numero,' - ',li.nome)
                 ,vr.nome
                 ,vr.obs 

            FROM 
                gtc_linhas_variacao vr
                left join gtc_linhas li on (vr.id_linha = li.id)
            WHERE id_linha='$id_linha'
            ";
    $tabela = "<table class='table table-hover'>
                <thead class='thead-inverse'>
                  <tr>
                    <th>Código</th>
                    <th>Numero/Linha</th>
                    <th>Nome Variacao</th>
                    <th>Observação</th>
                    <th>Ação</th>
                  </tr>
                </thead>
              <tbody>";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tabela .="<tr>";
            $tabela .="<td>".$row["id"]."</td>";
            $tabela .="<td>".$row["concat(li.numero,' - ',li.nome)"]."</td>";
            $tabela .="<td>".$row["nome"]."</td>";
            $tabela .="<td>".$row["obs"]."</td>";
            $tabela .="<td><button class='btn btn-danger' value='".$row["id"]."'  onClick = 'aoClicarExcluir($(this).val())' >Excluir</button></td>";
            "<br>";
        }
    }
        $tabela .= "</tbody></table>";

        echo  $tabela;
}
?>