<?php
    include('../../app/conection.php');
    include('../../app/protection.php');
    include('../../app/logout.php');
    $sqlview = "SELECT * FROM usuarios ORDER BY nome DESC";
    $result = $pdo->query($sqlview);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficial Sicoob Empresas - Intranet</title>

    <!-- ICON IMPORT -->
    <link rel="shortcut icon" href="assets/imgfavicon.ico" />

    <!-- CSS IMPORT -->
    <link rel="stylesheet" href="../../style.css">

    <!-- FONT AWESOME IMPORT -->
    <script src="https://kit.fontawesome.com/4713c304f5.js" crossorigin="anonymous"></script>

    <!-- TAILWIND IMPORT -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
    <link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">

    <!-- SWEET ALERTS IMPORT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>
<body>
<header class="header">
        <div>
            <a href="indexadmin.php"><img src="../img/logo-empresas.png" alt="" class="sicoob-logo"></a>
        </div>
        <div class="header-itens">
            <ul class="header-itens-links js-menu">
                <a href="indexadmin.php">
                    <li class="header-item norma-asap-itens-white-small">Início</li>
                </a>
                <a href="ramaisadmin.php">
                    <li class="header-item norma-asap-itens-white-small">Ramais</li>
                </a>
                <a href="indexadmin.php #chamados">
                    <li class="header-item norma-asap-itens-white-small">Chamados</li>
                </a>
                <a href="indexadmin.php #links">
                    <li class="header-item norma-asap-itens-white-small">Links</li>
                </a>
                <a href="">
                    <li class="header-item norma-asap-itens-white-small">FAQ</li>
                </a>
            </ul>

            <span class="header-itens-separador"></span>

            <div class="header-itens">
                <p class="norma-asap-itens-white-small">Bem vindo, <span style="color: white;"><?php echo alterarNome($_SESSION['nome']);?></span></p>
                <?php
                    function alterarNome($nomeCompleto){
                        // Divide o nome completo em partes
                        $partesNome = explode(' ', $nomeCompleto);
                        // Obtém o primeiro nome
                        $primeiroNome = $partesNome[0];
                        // Obtém o último nome (último elemento do array)
                        $ultimoNome = end($partesNome);
                        // Retorna a combinação do primeiro e último nome
                        return $primeiroNome . ' ' . $ultimoNome;
                    }
                ?>
                <i id="seta-down" class="name-icon-i fa-solid fa-chevron-down" style="cursor: pointer;"></i>
                <div id="dropdown" class="itens-dropdown z-10 bg-white divide-y divide-gray-100 rounded-lg shadow w-48 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li>
                        <a href="../../app/exportar_usuarios.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Relatório de Usuários</a>
                    </li>
                    <li>
                        <a href="cadastro.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cadastro</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Configurações</a>
                    </li>
                    <li>
                        <form method="POST" action="" class="block px-4 py-2 hover:bg-gray-100 w-48 dark:hover:bg-gray-600 dark:hover:text-white" style="cursor: pointer;">
                            <button name="logout" href="#" class="w-48" style="margin-left: 0px; text-align: left;">Log out</button>
                        </form>
                    </li>
                    </ul>
                </div>
            </div>

        <div>

        </div>
    </div>
</header>


    <hr class="header-separador">
    <main style="margin-top: 50px;">
        <h1 class="norma-asap-itens-white-big" style="color: white; text-align: center;">Pesquisar Colaborador</h1>
        <form class="max-w-md mx-auto" method="GET" action="" id="search-form">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input name="search" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Procure Nomes, PAs..." required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Procurar</button>
            </div>
        </form>
    </main>

    <section class="ramais-container">
        <?php
        try{
            // Sua consulta SQL original para selecionar todos os dados
            $sql = "SELECT * FROM usuarios";

            // Verifique se há um parâmetro de pesquisa
            $params = [];
            if (!empty($_GET['search'])) {
                $search = '%' . $_GET['search'] . '%';
                // Adicione uma condição para cada coluna que deseja pesquisar
                $sql .= " WHERE nome LIKE ? OR setor LIKE ? OR pa LIKE ? OR ramal LIKE ?";
                $params = array_fill(0, 4, $search); // Preencha o array de parâmetros com a variável de pesquisa
            }

            // Adicione a ordenação à consulta
            $sql .= " ORDER BY nome ASC";

            // Preparar a consulta com parâmetros
            $stmt = $pdo->prepare($sql);
            // Verificar se a consulta foi preparada corretamente
            if ($stmt === false) {
                throw new Exception("Erro ao preparar a consulta.");
            }
            // Executar a consulta com os parâmetros
            $stmt->execute($params);

            while ($user_data = $stmt->fetch(PDO::FETCH_ASSOC)){
                echo '<div id="ramal-id">
                <div class="ramal-card-container">
                    <div class="ramal-top">
                        <h2 id="nome" class="norma-asap-itens-white-big-r">'.$user_data['nome'].'</h2>
                        <p id="setor" class="norma-asap-itens-white-medium-w" style="margin-top: -10px;">'.$user_data['setor'].'</p>
                        <p id="pa" class="norma-asap-itens-white-medium-w" style="margin-top: -10px;">PA - '.$user_data['pa'].'</p>
                    </div>
                </div>

                <div class="ramal-bottom">
                    <br>
                    <p class="norma-roboto-itens-black">Ramal</p>
                    <br>
                    <h1 id="ramal" class="big-roboto-itens-black">'.$user_data['ramal'].'</h1>
                    <br>
                    <hr>
                    <br>
                    <p id="email" class="norma-roboto-itens-black"><i class="fa fa-envelope"></i> | '.$user_data['email'].'</p>
                    <p id="telefone" class="norma-roboto-itens-black"><i class="fa fa-phone fa-rotate-90"></i> | '.$user_data['telefone'].'</p>
                    <br>
                    <hr>
                    <div style="margin: 20px 0px;">
                      <form method="POST" action="../../app/excluir_usuario.php" onsubmit="return confirmarExclusao()">
                        <input type="hidden" name="id_usuario" value="' . $user_data["id"] . '">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Editar</button>
                        <button type="button" onclick="exibirConfirmacao(event, ' . $user_data["id"] . ')" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Excluir</button>
                      </form>
                
                    </div>
                </div>
            </div>
        </div>';
            }
        }
        catch (Exception $e) {
            echo "Ocorreu um erro: " . $e->getMessage();
        }
        ?>
    </section>

    <footer class="relative pt-8 pb-6" style="margin-top: 150px; background-color: black;">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap text-left lg:text-left">
      <div class="w-full lg:w-6/12 px-4">
        <img src="../img/empresas.png" alt="" width="320px" style="margin-left: -30px;">
      </div>
      <div class="w-full lg:w-6/12 px-4">
        <div class="flex flex-wrap items-top mb-6">
          <div class="w-full lg:w-4/12 px-4 ml-auto">
            <span class="norma-asap-itens-white-medium block uppercase text-sm font-semibold mb-2">Links Importantes</span>
            <ul class="list-unstyled">
            <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="indexadmin.php">Inicio</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#ramais">Ramais</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#links">Links</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="#chamados">Chamados</a>
              </li>
            </ul>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <span class="norma-asap-itens-white-medium block uppercase text-sm font-semibold mb-2">Other Resources</span>
            <ul class="list-unstyled">
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://gestaodepessoas.sicoob.com.br/" target="_blank">Cursos</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://atendimento.sisbr.coop.br/tas/public/login/form" target="_blank">Portal CCS</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://web.sipag.com.br/sipagnet/emi/site" target="_blank">Sipagnet</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://app.pipefy.com/organizations/110391" target="_blank">Pipefy</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr class="my-6 border-blueGray-300">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-4/12 px-4 mx-auto text-center">
        <div class="norma-asap-itens-white-small">
          Copyright © <span id="get-current-year">2024</span> - Por Sicoob Empresas
        </div>
      </div>
    </div>
  </div>
</footer>

    <script src="../scripts/ramais.js"></script>
    <script src="../scripts/index.js"></script>
</body>
</html>