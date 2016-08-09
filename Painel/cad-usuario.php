<?php 
session_set_cookie_params(3600);
session_start();
    if((!isset ($_SESSION['id']) == true) and (!isset ($_SESSION['login']) == true))
    {
        header('location:./login/index.html');
    }
    $id_user = $_SESSION['id'];
    $logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<body>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Cadastro<small> Usuario</small>
            </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="admin.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Cadastro Usuario
                    </li>
                </ol>
                <ol>
                    <div id='div_retorno_usuario'></div>
                </ol>
                <div class="container">
                    <form role="form">
                          <div class="form-group">
                            <label for="nome">Nome Completo:</label>
                            <input type="text" class="form-control" id="user_nome" placeholder="ex: João da Silva"> 
                          </div>
                          <div class="form-group">
                            <label for="usuario">Usuario:</label>
                            <input type="text" class="form-control" id="user_usuario" placeholder="ex: joaosilva">
                          </div>
                          <div class="form-group">
                            <label for="senha">Senha:</label>
                            <input type="text" class="form-control" id="user_senha" placeholder="ex: 123456">
                          </div>
                          <div class="form-group">
                            <label for="repsenha">Repetir-Senha:</label>
                            <input type="text" class="form-control" id="user_repsenha" placeholder="ex:123456">
                          </div>
                          <div class="form-group">
                              <select id="user_nivel" class="selectpicker form-control show-tick">
                                    <option value="">Selecione o Nivel de Usuario...</option>
                                    <option value="0">Usuario Comun...</option>
                                    <option value="1">Usuario Administrador...</option>
                                </select>
                          </div>
                          <button id="btnGravarUser" type="button" class="btn btn-success">Gravar</button>
                          <button type="reset" value="Limpar" class="btn btn-warning" >Limpar</button>
                    </form>
                </div>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-file"></i> Usuarios Cadastrados
                    </li>
                </ol>
                <div class="container">
                   <div class="table-responsive" id="div_carrega_usuarios">
                       <?php include './carrega/carregausuarios.php';  ?> 
                    </div>
                </div> 
        </div>
    </div>
    <script>        
		$("#btnGravarUser").click(function(){
			$.ajax({
				type:'post',
				url:'./valida/gravausuario.php',
                async:false,
				data:{
					'user-nome':$('#user_nome').val(),
                    'user-usuario':$('#user_usuario').val(),
					'user-senha':$('#user_senha').val(),
                    'user-repsenha':$('#user_repsenha').val(), 
                    'user-nivel':$('#user_nivel').val()
                },
				timeout: '10000',
                statusCode:{
                        200: function(){
                            $('#div_retorno_usuario').load('./pages/cadastroUSER/pag-cad-success.php');
                            $('#div_carrega_usuarios').load('./carrega/carregausuarios.php');
                          },
  
                    }
                });
            });
    </script>
</body>

</html>
