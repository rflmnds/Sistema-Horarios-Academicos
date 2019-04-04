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
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <nav class="navbar navbar-expand-lg navbar-fixed-top navbar-light bg-light">
      <div class="navbar-header">
        <a class="navbar-brand" href="?pag=home">AMS</a>
      </div>
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav nav mr-auto">
          <li class='nav-item <?= $active['home'] ?>'><a class="nav-link" href="?pag=home">Home</a></li>
          <li class='nav-item <?= $active['horario'] ?>'><a class="nav-link" href="?pag=horario">Horários</a></li>

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
        <ul class="nav navbar-nav navbar-right mr-auto">
            <?php
              if(isset($_SESSION['usuario'])){
                if($_SESSION['tipoUsuario'] == 1){ // Administrador
                  echo "<li class='nav-item " . $active['users'] . "''><a href='?pag=users'><span class='glyphicon glyphicon-list'></span> Gerenciar usuários</a></li>";
                }
                else if($_SESSION['tipoUsuario'] == 2){ // Professor
                  echo "<li class='nav-item " . $active['portalprof'] . "'><a href='?pag=portalprof&id=$pro_cod'><span class='glyphicon glyphicon-user'></span> Portal do professor</a></li>";
                }
                else if($_SESSION['tipoUsuario'] == 3){ // Professor
                  echo "<li class='nav-item " . $active['users'] . "''><a href='?pag=users'><span class='glyphicon glyphicon-list'></span> Gerenciar usuários</a></li>";
                  echo "<li class='nav-item " . $active['portalprof'] . "'><a href='?pag=portalprof&id=$pro_cod'><span class='glyphicon glyphicon-user'></span> Portal do professor</a></li>";
                }
                echo "<li><a href='restrito/operacoes/logout.php'><span class='glyphicon glyphicon-off'></span> Log Out</a></li>";
              }
              else{ 
                echo "<li class='nav-item " . $active['login'] . "'><a class'nav-link' href='?pag=login'><i class='fa fa-sign-in'></i> Login</a></li>";
              }
            ?>
            <li class="nav-item"><a class="nav-link " href="?pag=sobre"><i class="fa fa-info"></i></a></li>
        </ul>
      </div>
    </nav>