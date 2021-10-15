<?php
include 'db_connection.php';

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');

$sql = "SELECT * FROM controle WHERE status='ANDAMENTO' AND data_ent < CURDATE()";
$atrasado = mysqli_query($conn, $sql);

$sql = "SELECT * FROM controle WHERE status='ANDAMENTO' AND data_ent >= CURDATE()";
$andamento = mysqli_query($conn, $sql);

$sql = "SELECT * FROM controle WHERE status='FINALIZADO'";
$finalizado = mysqli_query($conn, $sql);


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
                <div class="container">
                    <a class="btn waves-effect waves-light" href="cadastroRetirada.php" style="margin-top: 60px;">Cadastrar Retirada</a>
                    <h5>Atrasados</h5>
                    <?php if (mysqli_num_rows($atrasado) > 0) { ?>
                        <ul style="">
                        <?php while($row = mysqli_fetch_assoc($atrasado)) { 
                            $end = strtotime($date);
                            $start = strtotime($row["data_ent"]);
                            $difference = ($end - $start)/60/60/24;
                            echo $difference.' ';
                            $id = $row["id"];
                            $valor_final = $row["valor"] + 2 * $difference;
                            $query = "UPDATE controle SET valor_juros='$valor_final' WHERE id='$id'";
                            mysqli_query($conn, $query);
                            ?>
                                
                            <li class="">
                                <p style="display: inline-block"><?php echo $row["id"];?> </p>
                                <p style="display: inline-block"><?php echo $row["id_cliente"];?> </p>
                                <p style="display: inline-block"><?php echo $row["id_titulo"];?> </p>
                                <p style="display: inline-block"><?php echo $row["data_ret"];?> </p>
                                <p style="display: inline-block"><?php echo $row["data_ent"];?> </p>
                                <p style="display: inline-block"><?php echo $row["valor_juros"];?> </p>
                                <a href="finalizarLocacao.php?id="<?php echo $row["id"] ?>><i class="material-icons">check</i></a>

                                <div class="divider"></div>
                            </li>

                    <?php }}?>
                        </ul>
                    
                    <h5>Em andamento</h5>
                    <?php if (mysqli_num_rows($andamento) > 0) { ?>
                        <ul style="">
                        <?php while($row = mysqli_fetch_assoc($andamento)) { ?>
                            
                            <li class="">
                                <p style="display: inline-block"><?php echo $row["id"];?> </p>
                                <p style="display: inline-block"><?php echo $row["id_cliente"];?> </p>
                                <p style="display: inline-block"><?php echo $row["id_titulo"];?> </p>
                                <p style="display: inline-block"><?php echo $row["data_ret"];?> </p>
                                <p style="display: inline-block"><?php echo $row["data_ent"];?> </p>
                                <p style="display: inline-block"><?php echo $row["valor"];?> </p>
                                <a href="finalizarLocacao.php?id="<?php echo $row["id"] ?>><i class="material-icons">check</i></a>

                                <div class="divider"></div>
                            </li>

                    <?php } } ?>
                        </ul>
                        
                        <h5>Finalizados</h5>
                        <?php if (mysqli_num_rows($finalizado) > 0) { ?>
                        <ul style="">
                        <?php while($row = mysqli_fetch_assoc($finalizado)) { ?>

                            <li class="">
                                <p style="display: inline-block"><?php echo $row["id"];?> </p>
                                <p style="display: inline-block"><?php echo $row["id_cliente"];?> </p>
                                <p style="display: inline-block"><?php echo $row["id_titulo"];?> </p>
                                <p style="display: inline-block"><?php echo $row["data_ret"];?> </p>
                                <p style="display: inline-block"><?php echo $row["data_ent"];?> </p>
                                <p style="display: inline-block"><?php echo $row["valor"];?> </p>

                                <div class="divider"></div>
                            </li>

                    <?php }}?>
                        </ul>

                </div>
                    
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>