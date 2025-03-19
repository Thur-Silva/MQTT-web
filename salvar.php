<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senai";

// Criando conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Pegando os dados do formulário
$produto = $_POST['Pecas'];
$quantidade = $_POST['QuantidadePecas'];

// Inserindo no banco de dados
$sql = "INSERT INTO produtos (nome, qtd) VALUES ('$produto', '$quantidade')";

try {
  if ($conn->query($sql) === TRUE) {
    $alertMessage = "A operação foi realizada com sucesso!";
    $alertType = "success";
} else {
    $alertMessage = "Houve um erro na operação. Tente novamente.";
    $alertType = "danger";
}
} catch (mysqli_sql_exception $e) {
  
  $errorMessage = $e->getMessage(); // Captura a mensagem do erro
  
  $alertMessage = $errorMessage;
    $alertType = "danger";

}


$conn->close();
?>
