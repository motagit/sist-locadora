<?php 
include 'db_connection.php';
include 'controleLocacao.php';

$cliente = $_POST['cliente'];
$titulo = $_POST['titulo'];
$dat_ret = $_POST['data_ret'];
$dat_ent = $_POST['data_ent'];
$valor = $_POST['valor'];


if ($conn) {
    $query = "INSERT INTO controle VALUES (NULL, '$cliente', '$titulo', '$dat_ret', '$dat_ent', '$valor')";
    mysqli_query($conn, $query);
    header('Location: cadastroRetirada.php');
} else {
    die("Connection failed: " . mysqli_connect_error());
}


?>