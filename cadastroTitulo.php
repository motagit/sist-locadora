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
                        <h5>Cadastro de Títulos</h5>
                    </div>
                    <form class="col s12" action="cadastroTitulo_func.php" method="post">
                        <div class="row">
                            <div class="input-field col s8">
                                <input name="nome" type="text" required>
                                <label>Nome do Título</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s2">
                                <input type="text" name="ano" maxlength="4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                                <label>Ano</label>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="input-field col s4">
                                <select name="estoque" required>
                                    <option value="" disabled selected>Escolha uma opção</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="7">8</option>
                                </select>
                                <label>Quantidade em Estoque</label>
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
    <script type="text/javascript" src="js/main.js"></script>
</html>