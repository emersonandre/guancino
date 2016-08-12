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
    
    if($acesso == '1'){
        echo '<style>#divNivelAcesso { visibility: visible; }</style>';
    } else {
        echo '<style>#divNivelAcesso { visibility: hidden; }</style>';
    }
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Admin - Guancino Transportes</title>
    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="../css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
</head>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/index.html"><img src="img/logo.fw.png" ></a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="admin.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#linhas"><i class="fa fa-fw fa-arrows-v"></i>Linhas<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="linhas" class="collapse">
                             <li>
                                <a href="#" id="btnCadLinhas"><i class="fa fa-fw fa-edit"></i>Cadastro Linhas</a>
                            </li>
                            <li>
                                <a href="#" id="btnCadVariacao"><i class="fa fa-fw fa-edit"></i>Cadastro Variação</a>
                            </li>
                            <li>
                                <a href="#" id="btnCadHorarios"><i class="fa fa-fw fa-edit"></i>Cadastro Horarios</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#usuario"><i class="fa fa-fw fa-arrows-v"></i>Usuarios<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="usuario" class="collapse">
                            <li>
                                <a id="btnCadUsuario" href="#"><i class="fa fa-list-alt"></i> Cadastrar Usuario</a>
                            </li>
                            <li id="divNivelAcesso">
                                    <a id="btnEditUsuario" href="#"><i class="fa fa-list-alt"></i> Editar Usuario</a>
                            </li>
                        </ul>
                    </li>
                  <!--  <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li> -->
                    <li>
                        <a href="../horarios.php"><i class="fa fa-fw fa-dashboard"></i> Visualizar Horarios</a>
                    </li>
                    <li>
                        <a href="./pages/logout.php"><i class="fa fa-fw fa-users"></i> Sair</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid" id="conteudo_principal">
                <!-- Page Heading -->   
                        <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Painel<small>Administrador</small>
                            </h1>
                                <ol class="breadcrumb">
                                    <li>
                                        <i class="fa fa-dashboard"></i>  <a href="admin.html">Dashboard</a>
                                    </li>
                                    <li class="active">
                                        <i class="fa fa-file"></i> Painel Administrador
                                    </li>
                                </ol>
                        </div>
                    </div>                                    
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="../js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript -->
    <script src="../js/plugins/morris/raphael.min.js"></script>
    <script src="../js/plugins/morris/morris.min.js"></script>
    <script src="../js/plugins/morris/morris-data.js"></script>
    <script src="../js/md5.js"></script>
    <script type=text/javascript>
        $(function() {
            $("#a").keypress(function() {
                $("div#divNivelAcesso").hide();
            });
        });
    </script>
    <script type="text/javascript">
        $("#btnCadLinhas").click(function(){
            $("#conteudo_principal").load("./cad-linhas.php");
        });
        $("#btnCadVariacao").click(function(){
            $("#conteudo_principal").load("./cad-variacao.php");
        });
        $("#btnCadHorarios").click(function(){
            $("#conteudo_principal").load("./cad-horarios.php");
        });
        $("#btnCadUsuario").click(function(){
            $("#conteudo_principal").load("./cad-usuario.php");
        });
        $("#btnEditUsuario").click(function(){
            $("#conteudo_principal").load("./edit-usuario.php");
        }); 
    </script>

</body>

</html>
