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
?>
<?php
include '../../Painel/bd/conecta.php';

$id_linha = $_POST['id_linha'];


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
<script>
          $('#id_variacao').change(function(){
            var id_variacao = $('#id_variacao').val();
            var num_linha = $('#num_linha').val();
            console.log(num_linha);
            console.log(id_variacao);
            $.ajax({
		      type:'post',
		      url: '../Painel/carrega/carregahorarios.php',
		      data: {
                  'num_linha':num_linha,
                  'id_variacao':id_variacao
              },
              erro: function(){
                  alert('erro');
              },
		      success: function(data){
		          $("#tabela_horarios").html(data);
		      }

		    });
        });
    </script>