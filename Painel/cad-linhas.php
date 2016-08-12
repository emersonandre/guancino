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
                         <?php include './carrega/carregalinhas.php'; ?>
                          
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
		$("#btnGravar").click(function(){
			$.ajax({
				type:'post',
				url:'./valida/gravalinha.php',
				data:{
					'Nlinha':$('#cad_Nlinha').val(),
					'Linha':$('#cad_Linha').val(),
					'obs':$('#cad_obs').val() }, 
				timeout: '10000',
				error: function(error){
					//alert("Erro!");
                    $("#div_retorno").load('./pages/pag-danger.php');
				},
				success: function(){
					$('#tab_linhas').load('./carrega/carregalinhas.php');
                    $('#div_retorno').load('./pages/pag-success.php');
					//alert("Cadastrado com Sucesso!");
				}
			});
		});
        
        function aoClicarExcluir(id){
            $.ajax({
		      type:'post',
		      url: 'deletalinha.php',
		      data: {'id':id},
              error: function(error){
				  //alert("Erro!");
                  $("#div_retorno").load('./pages/pag-exc-danger.php');
              },
		      success: function(){
		          $("#tab_linhas").load('./valida/carregalinhas.php');
                  $("#div_retorno").load('./pages/pag-exc-success.php');
		          //alert("Excluido com Sucesso!");
		      }

		    });
        };
    </script>
    
</body>

</html>
