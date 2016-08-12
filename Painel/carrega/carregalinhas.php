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


 include "./bd/conecta.php"; 
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
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Numero Linha</th>
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
            $tabela .="<td class='alin-table'><span><span class='badge'>".$row["numero"]."</span></span></td>";
            $tabela .="<td class='alin-table'>".$row["nome"]."</td>";
            $tabela .="<td class='alin-table'>".$row["obs"]."</td>";
            $tabela .="<td class='alin-table'><button class='btn btn-danger' value='".$row["id"]."'  onClick = 'aoClicarExcluir($(this).val())' ><span class='badge'><i class='fa fa-trash-o fa-lg'></i></span> Deletar</a></button></td>";
            "<br>";
        }
    }
        $tabela .= "</tbody></table>";

        echo  $tabela;
