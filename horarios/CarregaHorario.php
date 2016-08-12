<?php

include '../horarios/conecta.php';
// Check connection

$id_linha = $_POST['id_linha'];
$id_variacao = $_POST['id_variacao'];

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
    
    $tabela = "
        <div class='row-fluid'>
            <table class='table table-hover hidden-xs'>
                <thead BGCOLOR=black>
                  <tr>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>variação</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Horario</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Seg</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Ter</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Qua</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Qui</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Sex</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Sab</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Dom/Fer</th>
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
            $tabela .="<td class='alin-table' <span><span class='badge'>".$row["variacao"]."</span></span></td>";
            $tabela .="<td class='alin-table' <span><span class='badge badge-success'>".$row["horario"]."</span></span></td>";
            if($row["segunda"] == 'SIM'){
                    $tabela .="<td  class='alin-table'><span><img src='./img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td  class='alin-table'><span><img src='./img/errado.png'alt='Não'> </span></td>";
                }
           if($row["terca"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='./img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='./img/errado.png'alt='Não'> </span></td>";
                }
            if($row["quarta"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='./img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='./img/errado.png'alt='Não'> </span></td>";
                }
            if($row["quinta"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='./img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='./img/errado.png'alt='Não'> </span></td>";
                }
            if($row["sexta"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='./img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='./img/errado.png'alt='Não'> </span></td>";
                }
            if($row["sabado"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='./img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='./img/errado.png'alt='Não'> </span></td>";
                }
            if($row["domingo"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='./img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='./img/errado.png'alt='Não'> </span></td>";
                }
        }
    }
        $tabela .= "</tbody></table></div>";

        echo  $tabela;

    //tabela para celular!

    $tabela_cel = "
        <div class='row-fluid hidden-sm hidden-md hidden-lg'>
            <table class='table table-hover'>
                <thead BGCOLOR=black>
                  <tr>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Hr</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>S</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>T</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Q</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Q</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>S</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>S</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>D/F</th>
                  </tr>
                </thead>
              <tbody>";
    
    
    if(!empty($_POST['id_variacao'])){
          $sql.=" and hr.id_variacao = '$id_variacao' ";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tabela_cel .="<tr>";
            $tabela_cel .="<td class='alin-table' <span><span class='badge badge-success'>".$row["horario"]."</span></span></td>";
            if($row["segunda"] == 'SIM'){
                    $tabela_cel .="<td  class='alin-table'><span><img src='./img/certo_cell.fw.png'alt='Sim'> </span></td>";
                }else{
                    $tabela_cel .="<td  class='alin-table'><span><img src='./img/errado_cell.fw.png'alt='Não'> </span></td>";
                }
           if($row["terca"] == 'SIM'){
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/certo_cell.fw.png'alt='Sim'> </span></td>";
                }else{
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/errado_cell.fw.png'alt='Não'> </span></td>";
                }
            if($row["quarta"] == 'SIM'){
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/certo_cell.fw.png'alt='Sim'> </span></td>";
                }else{
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/errado_cell.fw.png'alt='Não'> </span></td>";
                }
            if($row["quinta"] == 'SIM'){
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/certo_cell.fw.png'alt='Sim'> </span></td>";
                }else{
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/errado_cell.fw.png'alt='Não'> </span></td>";
                }
            if($row["sexta"] == 'SIM'){
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/certo_cell.fw.png'alt='Sim'> </span></td>";
                }else{
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/errado_cell.fw.png'alt='Não'> </span></td>";
                }
            if($row["sabado"] == 'SIM'){
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/certo_cell.fw.png'alt='Sim'> </span></td>";
                }else{
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/errado_cell.fw.png'alt='Não'> </span></td>";
                }
            if($row["domingo"] == 'SIM'){
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/certo_cell.fw.png'alt='Sim'> </span></td>";
                }else{
                    $tabela_cel .="<td class='alin-table'><span><img src='./img/errado_cell.fw.png'alt='Não'> </span></td>";
                }
        }
    }
        $tabela_cel .= "</tbody></table></div>";

        echo  $tabela_cel;

?>