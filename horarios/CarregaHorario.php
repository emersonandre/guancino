<?php

include 'conecta.php';
// Check connection

$id_linha = $_POST['id_linha'];
$id_variacao = $_POST['id_variacao'];
//$dia_selecionado = $_POST['dia_selecionado'];

    $sql = "select 
                hr.id
                ,concat(li.numero,' - ',li.nome)
                ,case hr.id_variacao  
                    when 0 then 'Sem Variacao'
                    else vr.nome
                end as variacao
                ,hr.horario as horario
                ,case hr.segunda
                    when 0 then 'NAO'
                    when 1 then 'SIM'
                end as segunda  
                ,case hr.terca
                    when 0 then 'NAO'
                    when 1 then 'SIM'
                end as terca
                ,case hr.quarta
                    when 0 then 'NAO'
                    when 1 then 'SIM'
                end as quarta
                ,case hr.quinta
                    when 0 then 'NAO'
                    when 1 then 'SIM'
                end as quinta
                ,case hr.sexta
                    when 0 then 'NAO'
                    when 1 then 'SIM'
                end as sexta
                ,case hr.sabado
                    when 0 then 'NAO'
                    when 1 then 'SIM'
                end as sabado
                ,case hr.domingo
                    when 0 then 'NAO'
                    when 1 then 'SIM'
                end as domingo
            from
                gtc_horarios hr
                inner join gtc_linhas li on (hr.id_linha=li.id)
                left join gtc_linhas_variacao vr on (hr.id_variacao = vr.id)

            where 
                hr.id_linha='$id_linha' 
                
            ";
    
    $tabela = "<table class='table table-hover'>
                <thead class='thead-inverse'>
                  <tr>
                    <th>Linha</th>
                    <th>variação</th>
                    <th>Horario</th>
                    <th>Segunda</th>
                    <th>Terça</th>
                    <th>Quarta</th>
                    <th>Quinta</th>
                    <th>Sexta</th>
                    <th>Sabado</th>
                    <th>Domingo/Feriado</th>
                  </tr>
                </thead>
              <tbody>";
    
    
    if(!empty($_POST['id_variacao'])){
          $sql.=" and hr.id_variacao = '$id_variacao' ";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tabela .="<tr>";
            $tabela .="<td <span><span class='badge'>".$row["concat(li.numero,' - ',li.nome)"]."</span></span></td>";
            $tabela .="<td>".$row["variacao"]."</td>";
            $tabela .="<td>".$row["horario"]."</td>";
            $tabela .="<td>".$row["segunda"]."</td>";
            $tabela .="<td>".$row["terca"]."</td>";
            $tabela .="<td>".$row["quarta"]."</td>";
            $tabela .="<td>".$row["quinta"]."</td>";
            $tabela .="<td>".$row["sexta"]."</td>";
            $tabela .="<td>".$row["sabado"]."</td>";
            $tabela .="<td>".$row["domingo"]."</td>";
        }
    }
        $tabela .= "</tbody></table>";

        echo  $tabela;

?>