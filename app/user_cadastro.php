<?php
include('conection.php');
include('protection.php');

if(isset($_POST['cadastrar'])){
    // Recuperando dados do formulário
    $nome = $_POST['nome'];
    $cpf = preg_replace('/[^0-9\+]/', '', $_POST['cpf']);
    $email = $_POST['email'];
    $ramal = $_POST['ramal'];
    $senha = $_POST['senha'];
    $telefone = preg_replace('/[^0-9\+]/', '', $_POST['telefone']);
    $acesso = $_POST['acesso'];
    $pa = $_POST['pa'];
    $setor = $_POST['setor'];

    // Verifica se há campos vazios
    if(empty($nome) || empty($cpf) || empty($email) || empty($ramal) || empty($telefone) || empty($pa) || empty($setor)){
        $response = array('success' => false, 'message' => 'Existem campos pendentes.');
    } else {
        // Verifica se o ramal já está cadastrado
        $verifyRamal = $pdo->prepare("SELECT * FROM usuarios WHERE ramal = ?");
        $verifyRamal->bindParam(1, $ramal);
        $verifyRamal->execute();
        $ramalResult = $verifyRamal->fetchAll(PDO::FETCH_ASSOC);

        if($ramalResult){
            $response = array('success' => false, 'message' => 'Ramal já cadastrado.');
        } else {
            // Verifica se o CPF já está cadastrado
            $verifyCpf = $pdo->prepare("SELECT * FROM usuarios WHERE cpf = ?");
            $verifyCpf->bindParam(1, $cpf);
            $verifyCpf->execute();
            $cpfResult = $verifyCpf->fetchAll(PDO::FETCH_ASSOC);

            if($cpfResult){
                $response = array('success' => false, 'message' => 'Este CPF já foi cadastrado.');
            } else {
                // Insere usuário no banco de dados
                $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
                $stmt = $pdo->prepare("INSERT INTO usuarios(nome, cpf, email, ramal, telefone, senha, acesso, pa, setor) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindParam(1, $nome);
                $stmt->bindParam(2, $cpf);
                $stmt->bindParam(3, $email);
                $stmt->bindParam(4, $ramal);
                $stmt->bindParam(5, $telefone);
                $stmt->bindParam(6, $senhaHash);
                $stmt->bindParam(7, $acesso);
                $stmt->bindParam(8, $pa);
                $stmt->bindParam(9, $setor);

                if($stmt->execute()){
                    $response = array('success' => true, 'message' => 'Usuário cadastrado com sucesso.');
                } else {
                    $response = array('success' => false, 'message' => 'Erro ao cadastrar usuário.');
                }
            }
        }
    }

    // Retorna a resposta como JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit();
}
?>
