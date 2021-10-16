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
            <li><a href="index.php"><i class="material-icons left">home</i>Menu</a></li>
          </ul>
        </div>
      </nav>
        
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="formCadastro z-depth-2">
                    <div class="formCadastroTitulo">
                        <a href="index.php"><i class="material-icons small left">arrow_back</i></a>
                        <h5>Cadastro de Clientes</h5>
                    </div>
                    <form class="col s12" action="cadastroCliente_func.php" method="post">
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="nome" name="nome" type="text" required>
                                <label>Nome</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="cpf" name="cpf" type="text" required>
                                <label>CPF</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input id="telefone" name="telefone" type="text" required>
                                <label>Telefone</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s8">
                                <input id="endereco" name="endereco" type="text" required>
                                <label>Endereço</label>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
</html>