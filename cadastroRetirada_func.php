<?php 
include 'db_connection.php';

$cliente = $_POST['cliente'];
$titulo = $_POST['titulo'];
$dat_ret = $_POST['data_ret'];
$dat_ent = $_POST['data_ent'];
$valor = $_POST['valor'];

$end = strtotime($dat_ent);
$start = strtotime($dat_ret);
$difference = $end - $start;

if ($start > $end) {
    header('Location: cadastroRetirada.php?dt=no');
} else {
    if ($conn) {
        $estoque_sql = mysqli_query($conn, "SELECT CAST(estoque AS INT) FROM titulos WHERE id ='$titulo'");
        $estoque_arr = mysqli_fetch_array($estoque_sql);
        $estoque = $estoque_arr[0] - 1;
        $query = "INSERT INTO controle VALUES (NULL, '$cliente', '$titulo', '$dat_ret', '$dat_ent', '$valor', 0, 1);";
        $query .= "UPDATE titulos SET estoque='$estoque' WHERE id='$titulo'";
        if (mysqli_multi_query($conn, $query) == true) {
            header('Location: controleLocacao.php?cad=ok');
        } else {
            header('Location: controleLocacao.php?cad=no');
        }
    } else {
        die("Connection failed: " . mysqli_connect_error());
    }
}
?>