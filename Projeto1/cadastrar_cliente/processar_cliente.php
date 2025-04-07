<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_completo = $_POST["nome_completo"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"] ?? null;

    // Conexão com o banco de dados (substitua com suas credenciais)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loja_manutencao";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO clientes (nome_completo, telefone, email) VALUES (:nome, :telefone, :email)");
        $stmt->bindParam(':nome', $nome_completo);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $cliente_id = $conn->lastInsertId();
        echo "cliente_id: " . $cliente_id; // Retorna o ID do cliente para o JavaScript

    } catch (PDOException $e) {
        echo "Erro ao cadastrar cliente: " . $e->getMessage();
    }
    $conn = null;
} else {
    echo "Acesso inválido.";
}
?>