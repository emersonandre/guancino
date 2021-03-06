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
                Cadastro<small>Horarios</small>
            </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="admin.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Horarios
                    </li>
                </ol>
                <ol>
                    <div id='retorno'></div>
                </ol>
                <div class="container">
                    <form role="form">
                            <div class="row">
                              <div class="col-xs-12">
                                <div class="form-group">
                                  <select id="num_linha" class="selectpicker form-control show-tick">
                                    <option value="">Selecione a Linha...</option>
                                          <?php include './valida/buscalinhas.php'; ?>
                                          <?php if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                             ?>
                                    <option id="num_linha" value="<?php echo $row['id']?>"><?php echo $row['nome'] ?></option>
                                    <?php } }?>
                                  </select>
                                </div>
                              </div>
                          </div>
                          <div class="row">
                              <div class="col-xs-12">
                                <div class="form-group">
                                  <div id='carrega_variacao'></div>
                                </div>
                              </div>
                          </div>
                          <div class="row-fluid ">
                           <div class="span12 row">
                            <div class="funkyradio">
                               <div class="span4">
                                    <div class="col-md-3 funkyradio-success">
                                        <input type="checkbox" name="radio" id="radio1"/>
                                        <label class="checkbox-inline" for="radio1">Segunda-Feira</label>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="col-md-3 funkyradio-success">
                                        <input type="checkbox" name="radio" id="radio2" />
                                        <label class="checkbox-inline" for="radio2">Terça-Feira</label>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="col-md-3 funkyradio-success">
                                        <input type="checkbox" name="radio" id="radio3" />
                                        <label class="checkbox-inline" for="radio3">Quarta-Feira</label>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="col-md-3 funkyradio-success">
                                        <input type="checkbox" name="radio" id="radio4" />
                                        <label class="checkbox-inline" for="radio4">Quinta-Feira</label>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="col-md-3 funkyradio-success">
                                        <input type="checkbox" name="radio" id="radio5" />
                                        <label class="checkbox-inline" for="radio5">Sexta-Feira</label>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="col-md-3 funkyradio-success">
                                        <input type="checkbox" name="radio" id="radio6" />
                                        <label class="checkbox-inline" for="radio6">Sabado</label>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="col-md-3 funkyradio-success">
                                        <input type="checkbox" name="radio" id="radio7" />
                                        <label class="checkbox-inline" for="radio7">Domingo/Feriado</label>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <br><p></p>
                        <!-- termina checkbox -->
                          <div class="span12 row">
                              <div class="span4 col-md-3">
                                   <label for="horario">Horario:</label>
                                    <input id="horario" type="text" class="form-control time-mask" onkeypress="mascara(this, '00:00')" maxlength="5" autocomplete="off" placeholder="Ex.: 00:00">
                              </div>
                          </div>
                          <br>
                          <div class="span12 row">
                              <div class="span2 col-md-3">
                                  <button id="btnGravarHr" type="button" class="btn btn-success">Gravar</button>
                                  <button type="reset" value="Limpar" class="btn btn-warning" >Limpar</button>
                              </div>
                          </div>
                    </form>
                </div>
                 <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-file"></i> Horarios Cadastrados
                    </li>
                </ol>
                <div class="container">
                   <div class="table-responsive" id="tabela_horarios">
                       <?php //include './carrega/carregahorarios.php';  ?> 
                    </div>
                </div>
        </div>
    </div>
    <!-- function Gravar os dados -->
    <script>        
		$("#btnGravarHr").click(function(){
			$.ajax({
				type:'post',
				url:'../Painel/valida/gravahorario.php',
                async:false,
				data:{
					'num_linha':$('#num_linha').val(),
                    'id_variacao':$('#id_variacao').val(),
					'radio1':$('#radio1').is(":checked"),
                    'radio2':$('#radio2').is(":checked"),
                    'radio3':$('#radio3').is(":checked"),
                    'radio4':$('#radio4').is(":checked"),
                    'radio5':$('#radio5').is(":checked"),
                    'radio6':$('#radio6').is(":checked"),
                    'radio7':$('#radio7').is(":checked"),
					'horario':$('#horario').val() 
                },
				timeout: '10000',
                statusCode:{
                        200: function(){
                                var num_linha = $('#num_linha').val();
                                var id_variacao = $('#id_variacao').val();
                                //console.log(num_linha);                 
                                $.ajax({
                                  type:'post',
                                  url: '../Painel/carrega/carregahorarios.php',
                                  data: {'num_linha':num_linha,'id_variacao':id_variacao},
                                  success: function(data){
                                      $("#tabela_horarios").html(data);
                                      $('#retorno').load('../Painel/pages/pag-success.php');
                                  }
                                });
                          },
                          400: function(){
                              //acao do erro aqui
                              $('#retorno').load('../Painel/pages/cadastroHR/pag-cad-info.php');
                          },
                          401: function(){
                              //acao do erro aqui
                              $('#retorno').load('../Painel/pages/pag-danger.php');
                          },
                          500: function(){
                              $('#retorno').load('../Painel/pages/cadastroHR/pag-cad-existe.php');
                        }   
                    }
                });
            });
    </script>
     <!-- FIM da function Gravar os dados -->
    <!--  function excluir dados da tabela -->
    <script>        
        function aoClicarExcluirHr(id){
            $.ajax({
		      type:'post',
		      url: '../Painel/valida/deletahorario.php',
		      data: {'id':id},
              error: function(error){
                    $('#retorno').load('../Painel/pages/pag-exc-danger.php');
                    var num_linha = $('#num_linha').val();
                    var id_variacao = $('#id_variacao').val();
                    console.log(num_linha);
                    $.ajax({
                      type:'post',
                      url: '../Painel/carrega/carregahorarios.php',
                      data: {'num_linha':num_linha,'id_variacao':id_variacao},
                      erro: function(){
                          alert('erro');
                      },
                      success: function(data){
                          $("#tabela_horarios").html(data);
                      }

                    });
				},  
		      success: function(){
                  $('#retorno').load('../Painel/pages/pag-exc-success.php');
                  var num_linha = $('#num_linha').val();
                  var id_variacao = $('#id_variacao').val();
                    console.log(num_linha);
                    $.ajax({
                      type:'post',
                      url: '../Painel/carrega/carregahorarios.php',
                      data: {'num_linha':num_linha,'id_variacao':id_variacao},
                      erro: function(){
                          alert('erro');
                      },
                      success: function(data){
                          $("#tabela_horarios").html(data);
                      }

                    });
		      }

		    });
        };
    </script>
    <!-- Function carrega tabela apos selecionar linhas -->
    <script>
        $('#num_linha').change(function(){
            var num_linha = $('#num_linha').val();
            console.log(num_linha);
            $.ajax({
		      type:'post',
		      url: '../Painel/carrega/carregahorarios.php',
		      data: {'num_linha':num_linha},
              erro: function(){
                  alert('erro');
              },
		      success: function(data){
		          $("#tabela_horarios").html(data);
		      }

		    });
        });
    </script>
    <!-- Function carrega select variacao -->
    <script>
         $('#num_linha').change(function(){
            var id_linha = $('#num_linha').val();
            console.log(id_linha);
            $.ajax({
		      type:'post',
		      url: '../Painel/valida/buscavariacao.php',
		      data: {'id_linha':id_linha},
              erro: function(){
                  alert('erro');
              },
		      success: function(data){
		          $("#carrega_variacao").html(data);
		      }

		    });
        });
    </script>
    <script>
        function mascara(t, mask){
                 var i = t.value.length;
                 var saida = mask.substring(1,0);
                 var texto = mask.substring(i)
                 if (texto.substring(0,1) != saida){
                 t.value += texto.substring(0,1);
                 }
                 }
    </script>