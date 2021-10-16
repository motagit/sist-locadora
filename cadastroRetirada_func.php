<?php 
include 'db_connection.php';

$cliente = $_POST['cliente'];
$titulo = $_POST['titulo'];
$dat_ret = $_POST['data_ret'];
$dat_ent = $_POST['data_ent'];
$valor = $_POST['valor'];


if ($conn) {
    $estoque_sql = mysqli_query($conn, "SELECT CAST(estoque AS INT) FROM titulos WHERE id ='$titulo'");
    $estoque_arr = mysqli_fetch_array($estoque_sql);
    $estoque = $estoque_arr[0] - 1;
    $query = "INSERT INTO controle VALUES (NULL, '$cliente', '$titulo', '$dat_ret', '$dat_ent', '$valor', 0, 1);";
    $query .= "UPDATE titulos SET estoque='$estoque' WHERE id='$titulo'";
    mysqli_multi_query($conn, $query);
    header('Location: controleLocacao.php');
} else {
    die("Connection failed: " . mysqli_connect_error());
}


?>