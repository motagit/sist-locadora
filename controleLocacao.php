<?php
include 'db_connection.php';

date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d');

$sql = "SELECT * FROM controle WHERE status=1 AND data_ent < CURDATE()";
$atrasado = mysqli_query($conn, $sql);

$sql = "SELECT * FROM controle WHERE status=1 AND data_ent >= CURDATE()";
$andamento = mysqli_query($conn, $sql);

$sql = "SELECT * FROM controle WHERE status=0";
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
                    <a class="btn waves-effect waves-light" href="cadastroRetirada.php" id="btn_retirada">Cadastrar Retirada</a>
                    <div class="input-field input-field-controle">
                        <i class="material-icons prefix">search</i>
                        <input type="text" id="inputFiltroControle" onkeyup="filtrarNomeLocacao()" placeholder="Pesquisar por nome do cliente...">
                    </div>
                    <?php if (mysqli_num_rows($atrasado) > 0) { ?>
                        <ul class="ul_locacao">
                        <?php while($row = mysqli_fetch_assoc($atrasado)) { 
                            $end = strtotime($date);
                            $start = strtotime($row["data_ent"]);
                            $difference = ($end - $start)/60/60/24;
                            $id = $row["id"];
                            $valor_final = $row["valor"] + 2 * $difference;
                            $query = "UPDATE controle SET valor_juros='$valor_final' WHERE id='$id'";
                            mysqli_query($conn, $query);

                            $id_titulo = $row["id_titulo"];
                            $nome_titulo_sql = mysqli_query($conn, "SELECT nome FROM titulos WHERE id ='$id_titulo';");
                            $nome_titulo_arr = mysqli_fetch_array($nome_titulo_sql);
                            $nome_titulo = $nome_titulo_arr[0];

                            $id_cliente = $row["id_cliente"];
                            $nome_cliente_sql = mysqli_query($conn, "SELECT nome FROM clientes WHERE id ='$id_cliente';");
                            $nome_cliente_arr = mysqli_fetch_array($nome_cliente_sql);
                            $nome_cliente = $nome_cliente_arr[0];
                            ?>
                            <div id="modal<?php echo $row['id'] ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Devolução de Título</h4>
                                    <p>Confirmar devolução de título?</p>
                                        <div class="retirada">
                                        <p><span>Nome do Cliente:</span> <?php echo $nome_cliente;?> </p>
                                        <p><span>Nome do Título:</span> <?php echo $nome_titulo;?> </p>
                                        <p><span>Data de Retirada:</span> <?php echo $row["data_ret"];?> </p>
                                        <p><span>Data de Entrega:</span> <?php echo $row["data_ent"];?> </p>
                                        <p><span>Valor Final:</span> R$<?php echo $row["valor_juros"];?> <small>(Valor Base: R$<?php echo $row["valor"]; ?>, Valor de Multa: R$<?php echo $difference*2;?>)</small></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    <a class="waves-effect waves-light btn-flat" href="finalizarLocacao.php?id=<?php echo $row["id"]?>&id_titulo=<?php echo $row["id_titulo"] ?>">Confirmar</a>
                                </div>
                            </div>
                                
                            <div class="retirada z-depth-1">
                                <div class="atrasado">
                                    <span>ID: <?php echo $row["id"];?></span>
                                </div>
                                <div class="atrasado">
                                    <span>Atrasado (<?php echo $difference ?> dias)</span>
                                </div>
                                
                                <li>
                                    <p><span>Nome do Cliente:</span> <?php echo $nome_cliente;?> </p>
                                    <p><span>Nome do Título:</span> <?php echo $nome_titulo;?> </p>
                                    <p><span>Data de Retirada:</span> <?php echo $row["data_ret"];?> </p>
                                    <p><span>Data de Entrega:</span> <?php echo $row["data_ent"];?> </p>
                                    <p><span>Valor Final:</span> R$<?php echo $row["valor_juros"];?> <small>(Valor Base: R$<?php echo $row["valor"]; ?>, Valor de Multa: R$<?php echo $difference*2;?>)</small></p>
                                    <a class="waves-effect waves-light btn modal-trigger" href="#modal<?php echo $row['id'] ?>">Finalizar</a>
                                </li>
                            </div>

                    <?php }}?>
                        </ul>
                    
                    <?php if (mysqli_num_rows($andamento) > 0) { ?>
                        <ul class="ul_locacao">
                        <?php while($row = mysqli_fetch_assoc($andamento)) { 
                            $id_titulo = $row["id_titulo"];
                            $nome_titulo_sql = mysqli_query($conn, "SELECT nome FROM titulos WHERE id ='$id_titulo';");
                            $nome_titulo_arr = mysqli_fetch_array($nome_titulo_sql);
                            $nome_titulo = $nome_titulo_arr[0];

                            $id_cliente = $row["id_cliente"];
                            $nome_cliente_sql = mysqli_query($conn, "SELECT nome FROM clientes WHERE id ='$id_cliente';");
                            $nome_cliente_arr = mysqli_fetch_array($nome_cliente_sql);
                            $nome_cliente = $nome_cliente_arr[0];
                        ?>
                            <div id="modal<?php echo $row['id'] ?>" class="modal">
                                <div class="modal-content">
                                    <h4>Devolução de Título</h4>
                                    <p>Confirmar devolução de título?</p>
                                    <div class="retirada">
                                        <p><span>Nome do Cliente:</span> <?php echo $nome_cliente;?> </p>
                                        <p><span>Nome do Título:</span> <?php echo $nome_titulo;?> </p>
                                        <p><span>Data de Retirada:</span> <?php echo $row["data_ret"];?> </p>
                                        <p><span>Data de Entrega:</span> <?php echo $row["data_ent"];?> </p>
                                        <p><span>Valor:</span> R$<?php echo $row["valor"];?></p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
                                    <a class="waves-effect waves-light btn-flat" href="finalizarLocacao.php?id=<?php echo $row["id"]?>&id_titulo=<?php echo $row["id_titulo"] ?>">Confirmar</a>
                                </div>
                            </div>
                            <div class="retirada z-depth-1">
                                <div class="andamento">
                                    <span>ID: <?php echo $row["id"];?></span>
                                </div>
                                <div class="andamento">
                                    <span>Em Andamento</span>
                                </div>
                                
                                <li>
                                    <p><span>Nome do Cliente:</span> <?php echo $nome_cliente;?> </p>
                                    <p><span>Nome do Título:</span> <?php echo $nome_titulo;?> </p>
                                    <p><span>Data de Retirada:</span> <?php echo $row["data_ret"];?> </p>
                                    <p><span>Data de Entrega:</span> <?php echo $row["data_ent"];?> </p>
                                    <p><span>Valor:</span> R$<?php echo $row["valor"];?></p>
                                    <a class="waves-effect waves-light btn modal-trigger" href="#modal<?php echo $row['id'] ?>">Finalizar</a>
                                </li>
                            </div>

                    <?php } } ?>
                        </ul>
                        
                        <?php if (mysqli_num_rows($finalizado) > 0) { ?>
                        <ul class="ul_locacao">
                        <?php while($row = mysqli_fetch_assoc($finalizado)) {
                            $id_titulo = $row["id_titulo"];
                            $nome_titulo_sql = mysqli_query($conn, "SELECT nome FROM titulos WHERE id ='$id_titulo';");
                            $nome_titulo_arr = mysqli_fetch_array($nome_titulo_sql);
                            $nome_titulo = $nome_titulo_arr[0];

                            $id_cliente = $row["id_cliente"];
                            $nome_cliente_sql = mysqli_query($conn, "SELECT nome FROM clientes WHERE id ='$id_cliente';");
                            $nome_cliente_arr = mysqli_fetch_array($nome_cliente_sql);
                            $nome_cliente = $nome_cliente_arr[0];                            
                        ?>

                            <div class="retirada z-depth-1">
                                <div class="finalizado">
                                    <span>ID: <?php echo $row["id"];?></span>
                                </div>
                                <div class="finalizado">
                                    <span>Finalizado</span>
                                </div>
                                
                                <li>
                                    <p><span>Nome do Cliente:</span> <?php echo $nome_cliente;?> </p>
                                    <p><span>Nome do Título:</span> <?php echo $nome_titulo;?> </p>
                                    <p><span>Data de Retirada:</span> <?php echo $row["data_ret"];?> </p>
                                    <p><span>Data de Entrega:</span> <?php echo $row["data_ent"];?> </p>
                                    <p class="valor_finalizado"><span>Valor:</span> R$<?php echo $row["valor"];?></p>
                                </li>
                            </div>

                    <?php }}?>
                        </ul>

                </div>
                    
                </div>
            </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/filtragem.js"></script>
    <script>
        <?php if (isset($_GET['cad'])) {
            if ($_GET['cad'] == 'ok') { ?>
                var toastOk = '<span><i class="material-icons left">check</i>Cadastrado com sucesso!</span>';
                M.toast({html: toastOk, classes: 'rounded'});
            <?php } if ($_GET['cad'] == 'no') { ?>
                var toastOk = '<span><i class="material-icons left">error</i>Ocorreu um erro ao cadastrar</span>';
                M.toast({html: toastOk, classes: 'rounded'});
        <?php }
        } ?>
    </script>
</html>