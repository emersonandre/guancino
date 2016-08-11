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
            <div class="col-lg-12">
                <h1>Horarios Transporte Coletivo Francisco Beltrão</h1>
                <div class="form-group">
                    <select id="busca_linha" class="selectpicker form-control show-tick">
                            <option value="">Selecione a Linha...</option>
                                <?php include '/horarios/linhas.php'; ?>
                                <?php if ($result->num_rows > 0) {
                                      while($row = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id']?>"><?php echo $row['nome'] ?></option>
                           <?php } }?>
                    </select>
                </div>
                <div id='divCarregaVariacao' class="form-group" >
                    
                </div>
                <div class="form-group">
                    <select id="busca_dia" class="selectpicker form-control show-tick">
                            <option value="">Selecione o Dia...</option>
                            <option value="1">Domingo/Feriado</option>
                            <option value="2">Segunda-Feira</option>
                            <option value="3">Terça-Feira</option>
                            <option value="4">Quarta-Feira</option>
                            <option value="5">Quinta-Feira</option>    
                            <option value="6">Sexta-Feira</option>
                            <option value="7">Sabádo</option>
                    </select>
                </div>
            </div>
            <div id="divCarregaHorarios" class="col-lg-12">
                
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
