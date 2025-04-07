<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cliente_id = $_POST["cliente_id"];
    $aparelho_id = $_POST["aparelho_id"];
    $servico_solicitado = $_POST["servico_solicitado"] ?? null;
    $senha_acesso = $_POST["senha_acesso"] ?? null;
    $acessorios_entregues = $_POST["acessorios_entregues"] ?? null;

    // Conexão com o banco de dados (substitua com suas credenciais)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loja_manutencao";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO ordens_servico (cliente_id, aparelho_id, servico_solicitado, senha_acesso, acessorios_entregues) VALUES (:cliente_id, :aparelho_id, :servico, :senha, :acessorios)");
        $stmt->bindParam(':cliente_id', $cliente_id);
        $stmt->bindParam(':aparelho_id', $aparelho_id);
        $stmt->bindParam(':servico', $servico_solicitado);
        $stmt->bindParam(':senha', $senha_acesso);
        $stmt->bindParam(':acessorios', $acessorios_entregues);
        $stmt->execute();

        echo "sucesso"; // Indica sucesso para o script JavaScript

    } catch (PDOException $e) {
        echo "Erro ao cadastrar OS inicial: " . $e->getMessage();
    }
    $conn = null;
} else {
    echo "Acesso inválido.";
}
?>