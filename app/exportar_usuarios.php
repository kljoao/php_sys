<?php
    include('conection.php');
        // Consulta para obter os dados da tabela de usuários
        $sql = "SELECT * FROM usuarios";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        // Verifica se há resultados
        if ($usuarios) {
            // Cabeçalhos do arquivo CSV
            $csv_content = "ID, Nome, Email, Telefone, CPF, Ramal, Setor, PA, Acesso\n";
    
            // Loop pelos resultados e adiciona ao conteúdo CSV
            foreach ($usuarios as $usuario) {
                $csv_content .= $usuario["id"] . "," . $usuario["nome"] . "," . $usuario["email"] . "," . $usuario["telefone"] . "," . $usuario["cpf"] . "," . $usuario["ramal"] . "," . $usuario["setor"] . "," . $usuario["pa"] . "," . $usuario["acesso"] ."\n";
            }
    
            // Define os cabeçalhos para download do arquivo CSV
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="usuarios.csv"');
    
            // Imprime o conteúdo CSV
            echo $csv_content;
            exit;
        } else {
            echo "Não foram encontrados registros na tabela de usuários.";
        }
    ?>