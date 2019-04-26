<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../tcc/favicon.png">

    <title>AMS</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <link href="css/bootstrap-grid.css" rel="stylesheet">
    <link href="css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.css" rel="stylesheet">
    <link href="css/bootstrap-reboot.min.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/starter-template.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  
  	<?php include('menus/navbar.php') ?>

    <div class="container">
      <?php
      	if(isset($_GET['pag'])){
      		$link = $_GET['pag'];
      		
          if($link == 'login'){
            include('restrito/operacoes/login.php');
          }
          else if($link == 'logout'){
            include('restrito/operacoes/logout.php');
          }
          else if($link == 'erro'){
            include('restrito/operacoes/erro.php');
          }
          else if($link == 'portalprof'){
            include('restrito/operacoes/portal_prof.php');
          }
          else if($link == 'users'){
            include('restrito/grids/grid_user.php');
          }
          else if($link == 'changeuser'){
            include('restrito/operacoes/user_info.php');
          }
          else if($link == 'caduser'){
            include('restrito/cads/cad_user.php');
          }
          else if($link == 'cadcurso'){
            include('restrito/cads/cad_curso.php');
          }
          else if($link == 'cadprof'){
            include('restrito/cads/cad_prof.php');
          }
          else if($link == 'caddisc'){
            include('restrito/cads/cad_disc.php');
          }
          else if($link == 'cadserie'){
            include('restrito/cads/cad_serie.php');
          }
          else if($link == 'cadbloco'){
            include('restrito/cads/cad_bloco.php');
          }
          else if($link == 'cadsala'){
            include('restrito/cads/cad_sala.php');
          }
          else if($link == 'cadmatriz'){
            include('restrito/cads/cad_matriz.php');
          }
          else if($link == 'cadturma'){
            include('restrito/cads/cad_turma.php');
          }
          else if($link == 'cadnivel'){
            include('restrito/cads/cad_nivel.php');
          }
          else if($link == 'cadprojeto'){
            include('restrito/cads/cad_projeto.php');
          }
          else if($link == 'profdisc'){
            include('restrito/operacoes/prof_disc.php');
          }
          else if($link == 'discprof'){
            include('restrito/operacoes/disc_prof.php');
          }
          else if($link == 'oferta'){
            include('restrito/operacoes/oferta.php');
          }
          else if($link == 'turmaserie'){
            include('restrito/operacoes/turma_serie.php');
          }
          else if($link == 'horario'){
            include('restrito/operacoes/horario.php');
          }
          else if($link == 'addaula'){
            include('restrito/operacoes/aula.php');
          }
          else if($link == 'cadturno'){
            include('restrito/cads/cad_turno.php');
          }
          else if($link == 'vincturno'){
            include('restrito/operacoes/vinc_turno.php');
          }
          else if($link == 'config'){
            include('restrito/grids/grid_config.php');
          }
          else if($link == 'addconfig'){
            include('restrito/cads/cad_config.php');
          }
          else if($link == 'home'){
            include('restrito/operacoes/home.php');
          }
          else {
            include('restrito/operacoes/home.php');
          }
      	}
      ?>

    </div><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <?php
      if(isset($_GET['pag'])){
        if($link == 'horario'){
          echo "<script src='js/ajax/ajax_horario.js?newversion'></script>";
        }
        else if($link == 'login' || $link == 'caduser' || $link == 'changeuser'){
          echo "<script src='js/view_password.js'></script>";
        }
      }
    ?>
  </body>
</html>