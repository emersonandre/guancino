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
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Usuario<small>Editar</small>
            </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="admin.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Usuario
                    </li>
                </ol>
                <ol>
                    <div id='div_retorno_update'></div>
                </ol>
                <div class="container">
                    <form role="form">
                      <ol>
                       <div class="form-group">
                        <?php include './bd/conecta.php'; ?>
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
                        <div id='div_edicao_usuario'></div>
                    </ol>
                    </form>
            </div>
        </div>
    </div>   
<script>
          $('#id_usuario').change(function(){
            var id_usuario = $('#id_usuario').val();
            $.ajax({
		      type:'post',
		      url: './carrega/editausuario.php',
		      data: {
                  'id_usuario':id_usuario
              },
              erro: function(){
                  alert('erro');
              },
		      success: function(data){
		          $("#div_edicao_usuario").html(data);
		      }

		    });
        });
    </script>  