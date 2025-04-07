<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quantidade_codigos = isset($_POST["quantidade_codigos"]) ? intval($_POST["quantidade_codigos"]) : 5;

    // Conexão com o banco de dados (substitua com suas credenciais)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loja_manutencao";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $codigosGerados = [];

        for ($i = 0; $i < $quantidade_codigos; $i++) {
            $codigo_unico = bin2hex(random_bytes(16)); // Gera um código hexadecimal aleatório de 32 caracteres

            $stmt = $conn->prepare("INSERT INTO codigos_tecnicos (codigo) VALUES (:codigo)");
            $stmt->bindParam(':codigo', $codigo_unico);
            $stmt->execute();

            $codigosGerados[] = $codigo_unico;
        }

        echo json_encode(['success' => true, 'codigos' => $codigosGerados]);

    } catch (PDOException $e) {
        echo json_encode(['error' => "Erro ao gerar códigos: " . $e->getMessage()]);
    }

    $conn = null;

} else {
    echo json_encode(['error' => "Acesso inválido."]);
}

?>