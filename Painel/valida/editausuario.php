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
<!DOCTYPE html>
<html lang="pt-br">

<head>
</head>

<body>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page<small>Subheading</small>
            </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="admin.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
                <?php include '../../Painel/bd/conecta.php'; ?>
                <select id="id_usuario" class="selectpicker form-control show-tick">
                    <option value="">Selecione a Variação...</option>
                        <?php                              
                            $sql = "SELECT id, nome, usuario, senha, flag FROM gtc_usuario WHERE 1";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                echo '<option id="id_usuario" onChange="insereVariacao()" value="'.$row['id'].'">'.$row['nome'].'</option>';
                                } 
                            }
                        ?>
                </select>
        </div>
    </div>
    

<script>
          $('#id_usuario').change(function(){
            var id_usuario = $('#id_usuario').val();
            $.ajax({
		      type:'post',
		      url: '../../Painel/carrega/carregahorarios.php',
		      data: {
                  'id_usuario':id_usuario
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
</body>
</html>