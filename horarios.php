<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="Emerson Andre Silvestrin" content="">
    <title>Guancino Transporte Coletivo Ltda.</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/logo-nav.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <style>
        .alin-table{
            text-align: center;
            vertical-align: top;
        }
      table {
          border: 1px solid ;
          margin-top: 10px; 
          width: 50%;
        }
        .divpers{
		   
		   text-align: center;
		   background-color:@brand-warning: #f0ad4e;
	   }
    </style>
    
</head>

<body>
    <nav class="navbar navbar-inverse">
      <div class="row">
      <div class="span4">
        <a src="img/gtc.png"></a>
      </div>
    </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3><strong>Horarios Transporte Coletivo Francisco Beltrão.</strong></h3>
                <hr class="small">
                <div class="form-group">
                    <select id="busca_linha" class="selectpicker form-control show-tick">
                            <option value="">Selecione a Linha...</option>
                                <?php include 'horarios/linhas.php'; ?>
                                <?php if ($result->num_rows > 0) {
                                      while($row = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['nome'] ?></option>
                           <?php } }?>
                    </select>
                </div>
                <div id='divCarregaVariacao' class="form-group" >
                    
                </div>
            </div>
            <div id="divCarregaHorarios" class="col-lg-12">
                
            </div>
        </div>
        <hr class="small">
        <div class="row" id="Rodape">
			<div class="col-lg-10 col-lg-offset-1 text-center">
                    <h4><strong>Guancino Transporte Coletivo Ltda.</strong>
                    </h4>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-phone fa-fw"></i>(46) 3524-7866</li>
                        <li><i class="fa fa-envelope-o fa-fw"></i> Em caso de dúvidas, os clientes podem enviar e-mail para
									<a href="mailto:name@example.com">gtc@guancino.com </a>
                        </li>
                    </ul>
				<hr class="small">
                    <p class="text-muted">Copyright &copy; Emerson Andre Silvestrin - 2015</p>
                    
			</div>
		</div>
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script>
        $('#busca_linha').change(function(){
            var id_linha = $('#busca_linha').val();
            console.log(id_linha);
            $.ajax({
		      type:'post',
		      url: 'horarios/CarregaHorario.php',
		      data: {
                    'id_linha':id_linha
              },
              erro: function(){
                  alert('erro');
              },
		      success: function(data){
		          $("#divCarregaHorarios").html(data);
		      }

		    });
        });
    </script>
    <!--  Carrega Variacao de Linha -->
     <script>
         $('#busca_linha').change(function(){
            var id_linha = $('#busca_linha').val();
            console.log(id_linha);
            $.ajax({
		      type:'post',
		      url: 'horarios/variacao.php',
		      data: {'id_linha':id_linha},
              erro: function(){
                  alert('erro');
              },
		      success: function(data){
		          $("#divCarregaVariacao").html(data);
		      }

		    });
        });
    </script>
</body>

</html>
