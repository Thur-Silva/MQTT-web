<?php
// Dados de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "senai";

// Criando a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando a conexão
if ($conn->connect_error) {
    echo "Erro ao conectar com o banco de dados."; // Apenas uma mensagem simples
    exit;
}

// Pegando os dados do formulário via POST
$produto = isset($_POST['Pecas']) ? $_POST['Pecas'] : '';
$quantidade = isset($_POST['QuantidadePecas']) ? $_POST['QuantidadePecas'] : '';

// Verificando se os dados estão vazios
if (empty($produto)) {
    echo "O campo produto não pode estar vazio."; // Resposta simples
} elseif (empty($quantidade) || !is_numeric($quantidade)) {
    echo "A quantidade deve ser preenchida com um número válido."; // Resposta simples
} else {
    // Inserindo os dados no banco de dados
    $sql = "INSERT INTO produtos (nome, qtd) VALUES ('$produto', '$quantidade')";

    try {
        if ($conn->query($sql) === TRUE) {
            echo "Cadastro realizado com sucesso!"; // Resposta simples de sucesso
        } else {
            echo "Houve um erro na operação. Tente novamente."; // Erro simples
        }
    } catch (mysqli_sql_exception $e) {
        echo "Erro ao tentar salvar: " . $e->getMessage(); // Mensagem de erro
    }
}

// Fechando a conexão com o banco de dados
$conn->close();
?>
