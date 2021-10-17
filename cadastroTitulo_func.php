<?php 
include 'db_connection.php';

$nome = $_POST['nome'];
$ano = $_POST['ano'];
$estoque = $_POST['estoque'];

if ($conn) {
    $query = "INSERT INTO titulos VALUES (NULL, '$nome', '$ano', '$estoque')";
    if (mysqli_query($conn, $query) == true) {
        header('Location: cadastroTitulo.php?cad=ok');
    } else {
        header('Location: cadastroTitulo.php?cad=no');
    }
} else {
    die("Connection failed: " . mysqli_connect_error());
}

?>