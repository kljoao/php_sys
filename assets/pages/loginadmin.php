<?php
include('../../app/conection.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['senha'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $password === $user['senha']) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['email'] = $user['email'];
            header('Location: indexadmin.php');
        } else {
            echo "<script>
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Usuário ou senha inválidos.',
                showConfirmButton: false,
                timer: 1500
              });
            </script>";
        }
    } catch (PDOException $e) {
        die("Erro na consulta SQL: ");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sicoob Empresas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              clifford: '#da373d',
            }
          }
        }
      }
    </script>
</head>
<body>
        <section class="min-h-screen flex items-stretch text-white ">
            <div class="lg:flex w-1/2 hidden bg-gray-500 bg-no-repeat bg-cover relative items-center" style="background-image: url(../img/sipag.jpg);">
                <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
            </div>
            <div class="lg:w-1/2 w-full flex items-center justify-center text-center md:px-16 px-0 z-0" style="background-color: #161616;">
                <div class="absolute lg:hidden z-10 inset-0 bg-gray-500 bg-no-repeat bg-cover items-center">
                    <div class="absolute bg-black opacity-60 inset-0 z-0"></div>
                </div>
                <div class="w-full py-6 z-20">
                    <h1 class="my-6">
                        <a href="../../index.php"><img src="../img/empresas.png" alt="" class="w-auto h-30 sm:h-40 inline-flex"></a>
                    </h1>
                    <form method="POST" action="" class="sm:w-2/3 w-full px-4 lg:px-0 mx-auto">
                        <div class="pb-2 pt-4">
                            <input type="email" name="email" id="email" placeholder="Email" class="block w-full p-4 text-lg rounded-sm bg-black">
                        </div>
                        <div class="pb-2 pt-4">
                            <input class="block w-full p-4 text-lg rounded-sm bg-black" type="password" name="senha" id="password" placeholder="Senha">
                        </div>
                        <div class="text-right text-gray-400 hover:underline hover:text-gray-100">
                            <a href="#">Esqueceu a senha?</a>
                        </div>
                        <div class="px-4 pb-2 pt-4">
                            <input type="submit" name="validLogin" class="uppercase block w-full p-4 text-lg rounded-full bg-indigo-500 hover:bg-indigo-600 focus:outline-none" style="cursor: pointer;"></input>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </body>
</html>