<?php 
include 'db_connection.php';

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];

if ($conn) {
    $query = "INSERT INTO clientes VALUES (NULL, '$nome', '$cpf', '$telefone', '$endereco')";
    mysqli_query($conn, $query);
    header('Location: cadastroCliente.php');
} else {
    die("Connection failed: " . mysqli_connect_error());
}

?>