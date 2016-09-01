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
                Cadastro<small>Linhas</small>
            </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="admin.html">Dashboard</a>
                    </li>
                    <li class="active" >
                        <i class="fa fa-file"></i> Cadastro Linhas
                    </li>
                </ol>
                <ol>
                    <div id='div_retorno'></div>
                </ol>
                <div class="container">
                    <form role="form">
                          <div class="form-group">
                            <label for="Nlinha">Numero:</label>
                            <input type="number_format" class="form-control" id="cad_Nlinha" placeholder="Numero da Linha"> 
                          </div>
                          <div class="form-group">
                            <label for="Linha">Linha:</label>
                            <input type="text" class="form-control" id="cad_Linha" placeholder="Nome da Linha">
                          </div>
                          <div class="form-group">
                            <label for="Obs">Observação:</label>
                            <input type="text" class="form-control" id="cad_obs" placeholder="Observaçoes Sobre a Linhas">
                          </div>
                          <button id="btnGravar" type="button" class="btn btn-success">Gravar</button>
                          <button type="reset" value="Limpar" class="btn btn-warning" >Limpar</button>
                    </form>
                </div>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-file"></i> Linhas Cadastradas
                    </li>
                    <li>
                       
                   </li>
                </ol> 
                 <div class="container">
                      <div class="table-responsive" id="tab_linhas">
                         <?php include '../Painel/carrega/carregalinhas.php'; ?>
                          
                      </div>
                </div>
        </div>
    </div>
    <script>
		$("#btnGravar").click(function(){
			$.ajax({
				type:'post',
				url:'../Painel/valida/gravalinha.php',
				data:{
					'Nlinha':$('#cad_Nlinha').val(),
					'Linha':$('#cad_Linha').val(),
					'obs':$('#cad_obs').val() }, 
				timeout: '10000',
				error: function(error){
					//alert("Erro!");
                    $("#div_retorno").load('../Painel/pages/pag-danger.php');
				},
				success: function(){
					$("#tab_linhas").load('../Painel/carrega/carregalinhas.php');
                    $("#div_retorno").load('../Painel/pages/pag-success.php');
					//alert("Cadastrado com Sucesso!");
				}
			});
		});
        function aoClicarExcluirLinha(id) {
            var msg=confirm("ATENCAO: Isso excluira todos os horarios e variaçoes da linha, deseja prosseguir?");
            if (msg){
       // function aoClicarExcluirLinha(id){
                $.ajax({
                  type:'post',
                  url: '../Painel/valida/deletalinha.php',
                  data: {'id':id},
                  statusCode:{
                        200: function(){
                            $("#tab_linhas").load('../Painel/valida/carregalinhas.php');
                            $("#div_retorno").load('../Painel/pages/deletaLinhas/pag-success.php');
                          },
                        411: function(){
                              //acao do erro aqui
                              $("#div_retorno").load('../Painel/pages/deletaLinhas/pag-411.php');
                          },
                        412: function(){
                              //acao do erro aqui
                              $("#div_retorno").load('../Painel/pages/deletaLinhas/pag-412.php');
                          },
                        413: function(){
                              $("#div_retorno").load('../Painel/pages/deletaLinhas/pag-413.php');
                          },
                        511: function(){
                              //acao do erro aqui
                              $("#div_retorno").load('../Painel/pages/deletaLinhas/pag-511.php');
                          },
                        512: function(){
                              //acao do erro aqui
                              $("#div_retorno").load('../Painel/pages/deletaLinhas/pag-512.php');
                          },
                        513: function(){
                              $("#div_retorno").load('../Painel/pages/deletaLinhas/pag-513.php');
                        }   
                    }
		      });
            }else{
                
            }
        };
    </script>
