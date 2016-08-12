<?php
$hostname = "localhost";
$username = "master";
$password = "145819";
$database = "painel_gtc";

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
                id
                ,numero
                ,nome
                ,obs 
            FROM gtc_linhas
            WHERE 1
            ";
    $tabela = "<table class='table table-hover'>
                <thead BGCOLOR=black>
                  <tr>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Código</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Nmero Linha</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Nome</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Observação</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Ação</th>
                  </tr>
                </thead>
              <tbody>";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tabela .="<tr>";
            $tabela .="<td class='alin-table'>".$row["id"]."</td>";
            $tabela .="<td class='alin-table'><span><span class='badge'>".$row["numero"]."</span></span></td>";
            $tabela .="<td class='alin-table'>".$row["nome"]."</td>";
            $tabela .="<td class='alin-table'>".$row["obs"]."</td>";
            $tabela .="<td class='alin-table'><button class='btn btn-danger' value='".$row["id"]."'  onClick = 'aoClicarExcluir($(this).val())' ><span class='badge'><i class='fa fa-trash-o fa-lg'></i></span> Deletar</a></button></td>";
            "<br>";
        }
    }
        $tabela .= "</tbody></table>";

        echo  $tabela;
}
?>
