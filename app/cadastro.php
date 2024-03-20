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
        echo '<script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Existem campos pendentes.",
            });
        </script>';
    } else {
        // Verifica se o ramal já está cadastrado
        $verifyRamal = $pdo->prepare("SELECT * FROM usuarios WHERE ramal = ?");
        $verifyRamal->bindParam(1, $ramal);
        $verifyRamal->execute();
        $ramalResult = $verifyRamal->fetchAll(PDO::FETCH_ASSOC);

        if($ramalResult){
            echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Ramal já cadastrado.",
                });
            </script>';
        } else {
            // Verifica se o CPF já está cadastrado
            $verifyCpf = $pdo->prepare("SELECT * FROM usuarios WHERE cpf = ?");
            $verifyCpf->bindParam(1, $cpf);
            $verifyCpf->execute();
            $cpfResult = $verifyCpf->fetchAll(PDO::FETCH_ASSOC);

            if($cpfResult){
                echo '<script>
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Este CPF já foi cadastrado.",
                    });
                </script>';
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
                    echo '<script>
                        Swal.fire({
                            title: "Usuário cadastrado!",
                            text: "Deseja cadastrar outro colaborador?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            cancelButtonText: "Cancelar",
                            confirmButtonText: "Sim, desejo!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "Your file has been deleted.",
                                    icon: "success"
                                });
                            }
                        });
                    </script>';
                } else {
                    echo '<script>
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Erro ao cadastrar usuário.",
                        });
                    </script>';
                }
            }
        }
    }
}


?>