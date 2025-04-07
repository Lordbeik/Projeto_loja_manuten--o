<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_usuario = $_POST["nome_usuario"];
    $senha = $_POST["senha"];
    $confirmar_senha = $_POST["confirmar_senha"];
    $email = $_POST["email"] ?? null;
    $codigo_tecnico_digitado = trim($_POST["codigo_tecnico"]);

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "loja_manutencao";

    // Conexão com o banco de dados

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Verificar se o nome de usuário já existe
        $stmt_check_codigo = $conn->prepare("SELECT id FROM codigos_tecnicos WHERE codigo = :codigo AND usado = FALSE");
        $stmt_check_codigo->bindParam(':codigo', $codigo_tecnico_digitado);
        $stmt_check_codigo->execute();
        $codigo_valido = $stmt_check_codigo->fetch(PDO::FETCH_ASSOC);
        
        if (!$codigo_valido) {
            echo "Código de técnico inválido ou já utilizado.";
            exit();
        }

        // Verificar se as senhas coincidem
        if ($senha !== $confirmar_senha) {
            echo "As senhas não coincidem.";
            exit();
        }

        // Verificar o código técnico
        $stmt_check_codigo = $conn->prepare("SELECT id FROM codigos_tecnicos WHERE codigo = :codigo AND usado = FALSE");
        $stmt_check_codigo->bindParam(':codigo', $codigo_tecnico_digitado);
        $stmt_check_codigo->execute();
        $codigo_valido = $stmt_check_codigo->fetch(PDO::FETCH_ASSOC);

        if (!$codigo_valido) {
            echo "Código de técnico inválido ou já utilizado.";
            exit();
        }

        // Hash da senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir o novo técnico
        $stmt_insert_tecnico = $conn->prepare("INSERT INTO usuarios_tecnicos (nome_usuario, senha, email) VALUES (:nome_usuario, :senha, :email)");
        $stmt_insert_tecnico->bindParam(':nome_usuario', $nome_usuario);
        $stmt_insert_tecnico->bindParam(':senha', $senha_hash);
        $stmt_insert_tecnico->bindParam(':email', $email);
        $stmt_insert_tecnico->execute();

        // Marcar o código como usado
        $stmt_update_codigo = $conn->prepare("UPDATE codigos_tecnicos SET usado = TRUE, data_uso = NOW() WHERE id = :codigo_id");
        $stmt_update_codigo->bindParam(':codigo_id', $codigo_valido['id']);
        $stmt_update_codigo->execute();

        echo "sucesso";

    } catch (PDOException $e) {
        echo "Erro ao cadastrar técnico: " . $e->getMessage();
    }
    $conn = null;
} else {
    echo "Acesso inválido.";
}
?>