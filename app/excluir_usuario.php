<?php
include('conection.php');
include('protection.php');

// Verifique se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se o ID do usuário foi enviado
    if (isset($_POST["id_usuario"])) {
        // ID do usuário a ser excluído
        $idUsuario = $_POST["id_usuario"];
        
        // Excluir o usuário do banco de dados
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$idUsuario]);
        
        // Redirecione de volta para a página de ramais após a exclusão
        header("Location: ../assets/pages/ramaisadmin.php");
        exit();
    } else {
        // Se o ID do usuário não foi enviado, exiba uma mensagem de erro
        echo "ID do usuário não fornecido.";
    }
} else {
    // Se não for uma solicitação POST, redirecione de volta para a página de ramais
    header("Location: ../assets/pages/ramaisadmin.php");
    exit();
}
?>
