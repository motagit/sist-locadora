<?php
include 'db_connection.php';

$sql = "SELECT * FROM titulos";
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
                <div class="formCadastro z-depth-2">
                    <div class="formCadastroTitulo">
                        <a href="cadastroRetirada.php"><i class="material-icons small left">arrow_back</i></a>
                        <h5>Selecionar Título</h5>
                    </div>
                    <?php if (mysqli_num_rows($result) > 0) { ?>
                        <ul style="height: 500px; overflow-y:scroll;">
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>

                            <a href="cadastroRetirada.php?id_cliente=<?php echo $_GET['id_cliente']?>&nome_cliente=<?php echo $_GET['nome_cliente'] ?>&id_titulo=<?php echo $row["id"]?>&nome_titulo=<?php echo $row["nome"] ?>">
                                <li class="">
                                    <p><?php echo $row["id"];?> </p>
                                    <p><?php echo $row["nome"]; ?></p>
                                    <p><?php echo $row["ano"]; ?></p>
                                    <p><?php echo $row["estoque"]; ?></p>
                                    <div class="divider"></div>
                                </li>
                            </a>

                    <?php }}?>
                        </ul>
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