<!DOCTYPE html>
  <html>
    <head>

      <title>Controle de Locadora</title>

      <link type="text/css" rel="stylesheet" href="css/style.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      

      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <nav class="blue darken-3">
        <div class="nav-wrapper">
          <a href="index.php" class="brand-logo center">Controle de Locadora</a>
          <ul id="nav-mobile" class="right">
            <li class="active"><a href="index.php"><i class="material-icons left">home</i>Menu</a></li>
          </ul>
        </div>
      </nav>
        
    </head>

    <body>
      <div class="container">
        <div class="row">
          <ul class="menu">
            <li style="display: inline-block;">
              <a class="waves-effect waves-light btn" id="btn-index" href="cadastroTitulo.php">
                <i class="material-icons large">local_movies</i>
                Cadastro de Títulos
              </a>
            </li>
            <li style="display: inline-block;">
              <a class="waves-effect waves-light btn" id="btn-index" href="cadastroCliente.php">
                <i class="material-icons large">person_add</i>
                Cadastro de Clientes
              </a>
            </li>
            <li style="display: inline-block;">
              <a class="waves-effect waves-light btn" id="btn-index" href="controleLocacao.php">
                <i class="material-icons large">view_list</i>
                Controle de Locação
              </a>
            </li>
          </ul>
        </div>
      </div>
      
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>