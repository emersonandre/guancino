<!DOCTYPE html>
<html lang="pt-br">

<head>
<link href="/css/label.css" rel="stylesheet">
</head>

<body>
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
                        <i class="fa fa-file"></i> Cadastro Variacao
                    </li>
                </ol>
                <ol>
                    <div id='div_retorno_variacao'></div>
                </ol>
                <div class="container">
                    <form role="form">
                          <div class="row">
                              <div class="col-xs-12">
                                <div class="form-group">
                                  <select id="id_linha" class="selectpicker form-control show-tick">
                                    <option value="">Selecione a Linha...</option>
                                          <?php include './valida/buscalinhas.php'; ?>
                                          <?php if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                             ?>
                                    <option id="id_linha" value="<?php echo $row['id']?>"><?php echo $row['nome'] ?></option>
                                    <?php } }?>
                                  </select>
                                </div>
                              </div>
                          </div>
                          <div class="form-group">
                            <label for="variacao">Linha:</label>
                            <input type="text" class="form-control" id="cad_variacao" placeholder="Nome da Variacao">
                          </div>
                          <div class="form-group">
                            <label for="Obs">Observação:</label>
                            <input type="text" class="form-control" id="cad_obs_var" placeholder="Observaçoes Sobre a Variação">
                          </div>
                          <button id="btnGravarVr" type="button" class="btn btn-success">Gravar</button>
                          <button type="reset" value="Limpar" class="btn btn-warning" >Limpar</button>
                    </form>
                </div>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-file"></i>Variaçoes Cadastradas
                    </li>
                    <li>
                       
                   </li>
                </ol> 
                 <div class="container">
                      <div class="table-responsive" id="tab_variacao">
                             
                      </div>
                </div>
        </div>
    </div>
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
   
    <script>
		$("#btnGravarVr").click(function(){
			$.ajax({
				type:'post',
				url:'./valida/gravavariacao.php',
				data:{
					'id_linha':$('#id_linha').val(),
					'variacao':$('#cad_variacao').val(),
					'obs_variacao':$('#cad_obs_var').val() 
                }, 
				timeout: '10000',
				error: function(error){
					//alert("Erro!");
                    $("#div_retorno_variacao").load('./pages/pag-danger.php');
				},
				success: function(){
                    $('#div_retorno_variacao').load('./pages/pag-success.php');
                    $('#tab_variacao').load('./carrega/carregavariacao.php');
					//alert("Cadastrado com Sucesso!");
				}
			});
		});
    </script>
      <!-- function excluir dados da tabela-->
       <script>
        function aoClicarExcluirVr(id){
            $.ajax({
		      type:'post',
		      url: 'deletavariacao.php',
		      data: {'id':id},
              error: function(error){
				  //alert("Erro!");
                  $("#div_retorno_variacao").load('./pages/pag-exc-danger.php');
              },
		      success: function(){
		          $("#tab_variacao").load('./carrega/carregavariacao.php');
                  $("#div_retorno_variacao").load('./pages/pag-exc-success.php');
		          //alert("Excluido com Sucesso!");
		      }

		    });
        };
    </script>
    <!-- function carrega variacoes cadastradas ao selecionar linha -->
    <script>
        $('#id_linha').change(function(){
            var id_linha = $('#id_linha').val();
            console.log(id_linha);
            $.ajax({
		      type:'post',
		      url: './carrega/carregavariacao.php',
		      data: {'id_linha':id_linha},
              erro: function(){
                  alert('erro');
              },
		      success: function(data){
		          $("#tab_variacao").html(data);
		      }

		    });
        });
    </script>
    
</body>

</html>
