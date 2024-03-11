<?php
    include('../../app/conection.php');
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

</head>
<body>
    <header class="header">
        <div>
            <a href="../../index.php"><img src="../img/logo-empresas.png" alt="" class="sicoob-logo"></a>
        </div>
        <div class="header-itens">
            <ul class="header-itens-links">
                <a href="../../index.php">
                    <li norma-asap-itens-white-small class="header-item norma-asap-itens-white-small">Início</li norma-asap-itens-white-small>
                </a>
                <a href="ramais.php">
                    <li norma-asap-itens-white-small class="header-item norma-asap-itens-white-small">Ramais</li norma-asap-itens-white-small>
                </a>
                <a href="../../index.php #chamados">
                    <li norma-asap-itens-white-small class="header-item norma-asap-itens-white-small">Chamados</li norma-asap-itens-white-small>
                </a>
                <a href="../../index.php #links">
                    <li norma-asap-itens-white-small class="header-item norma-asap-itens-white-small">Links</li norma-asap-itens-white-small>
                </a>
                <a href="">
                    <li norma-asap-itens-white-small class="header-item norma-asap-itens-white-small">FAQ</li norma-asap-itens-white-small>
                </a>
            </ul>

            <span class="header-itens-separador"></span>

            <div class="header-itens">
                <ul>
                    <a href="login.php">
                        <li norma-asap-itens-white-small class="header-item norma-asap-itens-white-small">Login</li norma-asap-itens-white-small>
                    </a>
                </ul>
                <ul>
                    <li norma-asap-itens-white-small>
                        <a href="login.php">
                            <button class="admin-button norma-asap-itens-black" style="cursor:pointer;">
                                Administrador
                            </button>
                        </a>
                    </li norma-asap-itens-white-small>
                </ul>
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
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.creative-tim.com/presentation?ref=njs-profile">Inicio</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://blog.creative-tim.com?ref=njs-profile">Ramais</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.github.com/creativetimofficial?ref=njs-profile">Links</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.creative-tim.com/bootstrap-themes/free?ref=njs-profile">Chamados</a>
              </li>
            </ul>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <span class="norma-asap-itens-white-medium block uppercase text-sm font-semibold mb-2">Other Resources</span>
            <ul class="list-unstyled">
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-profile">MIT License</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/terms?ref=njs-profile">Terms &amp; Conditions</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/privacy?ref=njs-profile">Privacy Policy</a>
              </li>
              <li>
                <a class="norma-asap-itens-white-small hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/contact-us?ref=njs-profile">Contact Us</a>
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
</body>
</html>