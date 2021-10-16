<?php 
include 'db_connection.php';

$id = $_GET['id'];
$id_titulo = $_GET['id_titulo'];

if ($conn) {
    
    $valor_juros_sql = mysqli_query($conn, "SELECT valor_juros FROM controle WHERE id ='$id'");
    $valor_juros_arr = mysqli_fetch_array($valor_juros_sql);
    $valor_final = floatval($valor_juros_arr[0]);
    $query = "UPDATE controle SET status=0 where id='$id';";

    if ($valor_final != 0) {
        $query .= "UPDATE controle SET valor=$valor_final where id='$id';";
        $query .= "UPDATE controle SET valor_juros=0 where id='$id';";
        mysqli_multi_query($conn, $query);
    } else {
        mysqli_query($conn, $query);
    }
    
    header('Location: controleLocacao.php?');
} else {
    die("Connection failed: " . mysqli_connect_error());
}

?>