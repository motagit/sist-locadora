<?php 
include 'db_connection.php';

$nome = $_POST['nome'];
$ano = $_POST['ano'];
$estoque = $_POST['estoque'];

if ($conn) {
    $query = "INSERT INTO titulos VALUES (NULL, '$nome', '$ano', '$estoque')";
    mysqli_query($conn, $query);
    header('Location: cadastroTitulo.php');
} else {
    die("Connection failed: " . mysqli_connect_error());
}

?>