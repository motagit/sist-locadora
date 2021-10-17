<?php
include 'db_connection.php';

$sql = "SELECT * FROM clientes ORDER BY id";
$result = mysqli_query($conn, $sql);
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
                <div class="formCadastro z-depth-2" >
                    <div class="formCadastroTitulo">
                        <a href="cadastroRetirada.php"><i class="material-icons small left">arrow_back</i></a>
                        <h5>Selecionar Cliente</h5>
                        
                    </div>
                    <div class="input-field">
                        <i class="material-icons prefix">search</i>
                        <input type="text" id="inputFiltro" onkeyup="filtrarNome()" placeholder="Pesquisar por nome...">
                    </div>
                    <?php if (mysqli_num_rows($result) > 0) { ?>
                        <ul id="ul_clientes_titulos">
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                <li class="selec">
                                    <p><span>ID:</span> <?php echo $row["id"];?> </p>
                                    <p><span>Nome Completo:</span> <?php echo $row["nome"]; ?></p>
                                    <p><span>CPF:</span> <?php echo $row["cpf"]; ?></p>
                                    <p><span>Endereço:</span> <?php echo $row["endereco"]; ?></p>
                                    <a href="selecionarTitulo.php?id_cliente=<?php echo $row["id"]?>&nome_cliente=<?php echo $row["nome"] ?>">
                                        <i class="material-icons medium">arrow_forward</i>
                                    </a>
                                    <div class="divider"></div>
                                </li>
                    <?php }}?>
                        </ul>
                        
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/filtragem.js"></script>
</html>