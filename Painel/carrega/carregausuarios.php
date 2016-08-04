<?php

include './bd/conecta.php';

$senha='******';

$sql="SELECT 
        id
        ,nome
        ,usuario
        ,'******'
        ,case flag 
            when 0 then 'Usuario Comun'
            when 1 then 'Usuario Administrador'
        end as nivel
    FROM 
        gtc_usuario
    WHERE 1";

$tabela = "<table class='table table-hover'>
                <thead class='thead-inverse'>
                  <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Usuario</th>
                    <th>Senha</th>
                    <th>Nivel</th>
                    <th>Ação</th>
                  </tr>
                </thead>
              <tbody>";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tabela .="<tr>";
            $tabela .="<td>".$row["id"]."</td>";
            $tabela .="<td>".$row["nome"]."</td>";
            $tabela .="<td>".$row["usuario"]."</td>";
            $tabela .="<td>".$row["******"]."</td>";
            $tabela .="<td>".$row["nivel"]."</td>";
            $tabela .="<td><button class='btn btn-danger' value='".$row["id"]."'  onClick = 'aoClicarExcluir($(this).val())' >Excluir</button></td>";
            "<br>";
        }
    }
        $tabela .= "</tbody></table>";

        echo  $tabela;
?>