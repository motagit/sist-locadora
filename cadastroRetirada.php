<?php 


?>

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
                        <h5>Cadastro de Retirada</h5>
                    </div>
                    <form class="col s12" action="cadastroRetirada_func.php" method="post">
                        <div class="row">
                        <?php if (isset($_GET['nome_cliente'])) { ?>
                            <div class="input-field col s6">
                                <input name="cliente" type="text" value="<?php echo $_GET['id_cliente']?>" readonly="readonly" required>
                                <label>Cliente (ID)</label>
                            </div>
                        <?php } else { ?>
                            <div class="input-field col s6">
                                <input name="cliente" type="text" readonly="readonly" required>
                                <label>Selecionar Cliente</label>
                            </div>
                        <?php } ?>
                            <a class="waves-effect waves-light btn" id="searchButton" href="selecionarCliente.php"><i class="material-icons">search</i></a>
                        </div>
                        <div class="row">
                        <?php if (isset($_GET['nome_titulo'])) { ?>
                            <div class="input-field col s6">
                                <input name="titulo" type="text" value="<?php echo $_GET['id_titulo']?>" readonly="readonly" required>
                                <label>Filme (ID)</label>
                            </div>
                        <?php } else { ?>
                            <div class="input-field col s6">
                                <input name="titulo" type="text" readonly="readonly" required>
                                <label>Selecionar Filme</label>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input class="datepicker" name="data_ret" type="text" required>
                                <label>Data de Retirada</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input class="datepicker" name="data_ent" type="text" required>
                                <label>Data de Entrega</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s4">
                                <input name="valor" type="text" required>
                                <label>Valor</label>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>

        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>

        <script>
             $(document).ready(function(){
                $('.datepicker').datepicker({
                    format: 'yyyy-mm-dd',
                });
            });
        </script>

    </body>
</html>