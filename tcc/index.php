<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>GerAcad</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
      <table class="table table-hover">
        <tr>
          <td><h4>Navbar provisória:</h4></td>
          <td><a href="?pag=cadcurso" class="btn btn-success">Curso</a></td>
          <td><a href="?pag=cadprof" class="btn btn-success">Professor</a></td>
          <td><a href="?pag=caddisc" class="btn btn-success">Disciplina</a></td>
          <td><a href="?pag=cadbloco" class="btn btn-success">Bloco</a></td>
          <td><a href="?pag=cadsala" class="btn btn-success">Sala</a></td>
          <td><a href="?pag=cadppc" class="btn btn-success">PPC</a></td>
          <td><a href="?pag=cadserie" class="btn btn-success">Série</a></td>
          <td><a href="?pag=cadturma" class="btn btn-success">Turma</a></td>
        </tr>
      </table> 

      <?php
      	if(isset($_GET['pag'])){
      		$link = $_GET['pag'];
      		
          if($link == 'cadcurso'){
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
          else if($link == 'cadppc'){
            include('restrito/cads/cad_ppc.php');
          }
          else if($link == 'cadturma'){
            include('restrito/cads/cad_turma.php');
          }
          else if($link == 'profdisc'){
            include('restrito/operacoes/prof_disc.php');
          }
          else if($link == 'discprof'){
            include('restrito/operacoes/disc_prof.php');
          }
          else if($link == 'oferta'){
            include('restrito/operacoes/oferta.php');
<<<<<<< HEAD
          }
          else if($link == 'ofertateste'){
            include('restrito/operacoes/oferta_teste.php');
=======
            echo "<script src='js/ajax/ajax_oferta.js'</script>";
>>>>>>> origin
          }
          else if($link == 'turmaserie'){
            include('restrito/operacoes/turma_serie.php');
          }
      	}
      ?>
      

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<<<<<<< HEAD
    <?php
      if($link == 'ofertateste'){
         echo "<script src='js/ajax/ajax_oferta.js'></script>";
       }
    ?>
=======

>>>>>>> origin
  </body>
</html>
