<?php
$hostname = "localhost";
$username = "master";
$password = "145819";
$database = "painel_gtc";

$conn = mysqli_connect($hostname, $username, $password ,$database);


$num_linha = $_POST['num_linha'];
$id_variacao = $_POST['id_variacao'];

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else {
//resolve conexão com o banco!
//$con = new mysqli($host, $usuario, $senhabd, $banco) or die ("Sem conexão com o servidor");
//consulta datas;  
//select que recebe os parametros da funcao
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
                hr.id_linha='$num_linha' 
                
            ";
    
    $tabela = "<table class='table table-hover'>
                <thead class='thead-inverse'>
                  <tr>
                    <th width='30%'>Linha</th>
                    <th width='30%'>variação</th>
                    <th width='5%'>Horario</th>
                    <th class='alin_td' width='8%'>Segunda</th>
                    <th class='alin_td' width='8%'>Terça</th>
                    <th class='alin_td' width='8%'>Quarta</th>
                    <th class='alin_td' width='8%'>Quinta</th>
                    <th class='alin_td' width='8%'>Sexta</th>
                    <th class='alin_td' width='8%'>Sabado</th>
                    <th class='alin_td' width='8%'>Domingo/Feriado</th>
                    <th class='alin_td' width='8%'>Ação</th>
                  </tr>
                </thead>
              <tbody>";
    //verifica se a variavel esta vazia! e concatena para recarregar com a variacao
    if(!empty($_POST['id_variacao'])){
          $sql.= "                              
                and hr.id_variacao = '$id_variacao'
                ";
    }
    //fim da verificacao
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tabela .="<tr>";
            $tabela .="<td class='alin_txt'<span><span class='badge'>".$row["concat(li.numero,' - ',li.nome)"]."</span></span></td>";
            $tabela .="<td>".$row["variacao"]."</td>";
            $tabela .="<td <h5><span class='badge'>".$row["horario"]."</span></h5></td>";
            if($row["segunda"] == 'SIM'){
                    $tabela .="<td class='alin_td'><h4><span><span class='label label-success'>".$row["segunda"]."</span></span></h4></td>";
                }else{
                    $tabela .="<td class='alin_td'><h4><span><span class='label label-danger'>".$row["segunda"]."</span></span></h4></td>";
                }
            if($row["terca"] == 'SIM'){
                    $tabela .="<td class='alin_td'><h4><span class='label label-success'>".$row["terca"]."</span></h4></td>";
                }else{
                    $tabela .="<td class='alin_td'><h4><span class='label label-danger'>".$row["terca"]."</span></h4></td>";
                }
            if($row["quarta"] == 'SIM'){
                    $tabela .="<td class='alin_td'><h4><span class='label label-success'>".$row["quarta"]."</span></h4></td>";
                }else{
                    $tabela .="<td class='alin_td'><h4><span class='label label-danger'>".$row["quarta"]."</span></h4></td>";
                }
            if($row["quinta"] == 'SIM'){
                    $tabela .="<td class='alin_td'><h4><span class='label label-success'>".$row["quinta"]."</span></h4></td>";
                }else{
                    $tabela .="<td class='alin_td'><h4><span class='label label-danger'>".$row["quinta"]."</span></h4></td>";
                }
            if($row["sexta"] == 'SIM'){
                    $tabela .="<td class='alin_td'><h4><span class='label label-success'>".$row["sexta"]."</span></h4></td>";
                }else{
                    $tabela .="<td class='alin_td'><h4><span class='label label-danger'>".$row["sexta"]."</span></h4></td>";
                }
            if($row["sabado"] == 'SIM'){
                    $tabela .="<td class='alin_td'><h4><span class='label label-success'>".$row["sabado"]."</span></h4></td>";
                }else{
                    $tabela .="<td class='alin_td'><h4><span class='label label-danger'>".$row["sabado"]."</span></h4></td>";
                }
            if($row["domingo"] == 'SIM'){
                    $tabela .="<td class='alin_td'><h4><span class='label label-success'>".$row["domingo"]."</span></h4></td>";
                }else{
                    $tabela .="<td class='alin_td'><h4><span class='label label-danger'>".$row["domingo"]."</span></h4></td>";
                }
            $tabela .="<td><button class='btn btn-danger' value='".$row["id"]."'  onClick = 'aoClicarExcluirHr($(this).val())'> <span class='badge'><i class='fa fa-trash-o fa-lg'></i></span> Deletar</a></button></td>";
            "<br>";
        }
    }
        $tabela .= "</tbody></table>";

        echo  $tabela;
}
?>