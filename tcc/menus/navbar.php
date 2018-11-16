<?php
  $active['home'] = '';
  $active['horario'] = '';
  $active['portalprof'] = '';
  $active['login'] = '';
  $active['users'] = '';

  if(isset($_SESSION['professor'])){
    $pro_cod = $_SESSION['professor'];
  }

  if(isset($_GET['pag'])){
    $active[$_GET['pag']] = 'active';
  }
  else{
    $active['home'] = 'active';
  }
?>

    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">GerAcad</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class='<?= $active['home'] ?>'><a href="#">Home</a></li>
            <li class='<?= $active['horario'] ?>'><a href="?pag=horario">Horários</a></li>

            <li class='dropdown'>
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true" href="?pag=cads">
                Cadastros
                <span class="caret"></span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a href="?pag=cadcurso" class="dropdown-item">Curso</a></li>
                <li><a href="?pag=cadmatriz" class="dropdown-item">Matriz</a></li>
                <li><a href="?pag=cadserie" class="dropdown-item">Série</a></li>
                <li><a href="?pag=cadturma" class="dropdown-item">Turma</a></li>
                <li><a href="?pag=cadturno" class="dropdown-item">Turno</a></li>
                <li><a href="?pag=cadprof" class="dropdown-item">Professor</a></li>
                <li><a href="?pag=caddisc" class="dropdown-item">Disciplina</a></li>
                <li><a href="?pag=cadbloco" class="dropdown-item">Bloco Local</a></li>
                <li><a href="?pag=cadsala" class="dropdown-item">Sala</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <?php
                if(isset($_SESSION['usuario'])){
                  if($_SESSION['tipoUsuario'] == 1){ // Administrador
                    echo "<li class='" . $active['users'] . "''><a href='?pag=users'><span class='glyphicon glyphicon-user'></span> Gerenciar usuários</a></li>";
                  }
                  else if($_SESSION['tipoUsuario'] == 2){ // Professor
                    echo "<li class='" . $active['portalprof'] . "'><a href='?pag=portalprof&id=$pro_cod'><span class='glyphicon glyphicon-user'></span> Portal do professor</a></li>";
                  }
                  echo "<li><a href='restrito/operacoes/logout.php'><span class='glyphicon glyphicon-off'></span> Log Out</a></li>";
                }
                else{ 
                  echo "<li class='" . $active['login'] . "'><a href='?pag=login'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>";
                }
              ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>