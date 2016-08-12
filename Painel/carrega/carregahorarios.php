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
                  <thead BGCOLOR=black>
                  <tr>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Linha</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>variação</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Horario</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Segunda</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Terça</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Quarta</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Quinta</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Sexta</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Sabado</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Domingo/Feriado</th>
                    <th class='alin-table'><FONT COLOR='#FFFFFF'>Ação</th>
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
            $tabela .="<td class='alin-table'<span><span class='badge'>".$row["concat(li.numero,' - ',li.nome)"]."</span></span></td>";
            $tabela .="<td>".$row["variacao"]."</td>";
            $tabela .="<td class='alin-table'<h5><span class='badge'>".$row["horario"]."</span></h5></td>";
            if($row["segunda"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='../img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='../img/errado.png'alt='Não'> </span></td>";
                }
           if($row["terca"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='../img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='../img/errado.png'alt='Não'> </span></td>";
                }
            if($row["quarta"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='../img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='../img/errado.png'alt='Não'> </span></td>";
                }
            if($row["quinta"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='../img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='../img/errado.png'alt='Não'> </span></td>";
                }
            if($row["sexta"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='../img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='../img/errado.png'alt='Não'> </span></td>";
                }
            if($row["sabado"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='../img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='../img/errado.png'alt='Não'> </span></td>";
                }
            if($row["domingo"] == 'SIM'){
                    $tabela .="<td class='alin-table'><span><img src='../img/certo.png'alt='Sim'> </span></td>";
                }else{
                    $tabela .="<td class='alin-table'><span><img src='../img/errado.png'alt='Não'> </span></td>";
                }
                
            $tabela .="<td><button class='btn btn-danger' value='".$row["id"]."'  onClick = 'aoClicarExcluirHr($(this).val())'> <span class='badge'><i class='fa fa-trash-o fa-lg'></i></span> Deletar</a></button></td>";
            "<br>";
        }
    }
        $tabela .= "</tbody></table>";

        echo  $tabela;
}
?>