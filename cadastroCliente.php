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
                <div>
                    <form class="col s12" action="cadastroCliente_func.php" method="post">
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="nome" name="nome" type="text">
                                <label>Nome</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="cpf" name="cpf" type="text">
                                <label>CPF</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="telefone" name="telefone" type="text">
                                <label>Telefone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="endereco" name="endereco" type="text">
                                <label>Endereço</label>
                            </div>
                        </div>
                        <input class="waves-effect waves-light btn" type="submit" />
                    </form>
                </div>
            </div>
        </div>
      

      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>