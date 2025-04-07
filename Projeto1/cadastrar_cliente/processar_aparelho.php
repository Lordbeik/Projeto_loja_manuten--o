<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST["cliente_id"];
    $tipo = $_POST["tipo"];
    $marca = $_POST["marca"];
    $modelo = $_POST["modelo"];
    $serial = $_POST["serial"] ?? null;
    $problema_relatado = $_POST["problema_relatado"];

    // Conexão com o banco de dados (substitua com suas credenciais)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loja_manutencao";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO aparelhos (tipo, marca, modelo, serial, problema_relatado) VALUES (:tipo, :marca, :modelo, :serial, :problema)");
        $stmt->bindParam(':tipo', $tipo);
        $stmt->bindParam(':marca', $marca);
        $stmt->bindParam(':modelo', $modelo);
        $stmt->bindParam(':serial', $serial);
        $stmt->bindParam(':problema', $problema_relatado);
        $stmt->execute();

        $aparelho_id = $conn->lastInsertId();
        echo "aparelho_id: " . $aparelho_id; // Retorna o ID do aparelho

    } catch (PDOException $e) {
        echo "Erro ao cadastrar aparelho: " . $e->getMessage();
    }
    $conn = null;
} else {
    echo "Acesso inválido.";
}
?>