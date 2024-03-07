<?php
    include('../../app/conection.php');
    include('../../app/protection.php');

    if(isset($_POST['logout'])){
        session_start();
        session_unset();
        session_destroy();
        header("Location: ../../index.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oficial Sicoob Empresas - Intranet</title>

    <!-- ICON IMPORT -->
    <link rel="shortcut icon" href="../img/favicon.ico" />

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
            <a href="indexadmin.php"><img src="../img/logo-empresas.png" alt="" class="sicoob-logo"></a>
        </div>
        <div class="header-itens">
            <ul class="header-itens-links js-menu">
                <a href="indexadmin.php">
                    <li class="header-item norma-asap-itens-white-small">Início</li>
                </a>
                <a href="indexadmin.php #ramais">
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
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Relatórios</a>
                    </li>
                    <li>
                        <a href="cadastro.php" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cadastro</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Configurações</a>
                    </li>
                    <li>
                        <form method="POST" action="" class="block px-4 py-2 hover:bg-gray-100 w-48 dark:hover:bg-gray-600 dark:hover:text-white" style="cursor: pointer;">
                            <button name="logout" href="#" class="w-48" style="margin-left: 0px; text-align: left;outline: none; border: none;">Log out</button>
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

    <section class="cadastro-container">
        <div style="text-align: center; margin: 50px 0px;">
            <h1 class="norma-asap-itens-white-big-r">Cadastrar Novo Colaborador</h1>
        </div>
        
    <form action="" method="POST">
        <div class="cadastro-items-left">
            <div class="cadastro-item">
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nome</label>
                <input type="text" class="w-80 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="João Luis Bernardo">
            </div>
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">CPF</label>
                <input type="text" class="w-80 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="CPF">
            </div>
        </div>

        <div class="cadastro-items-left">
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                <input type="text" class="w-80 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="joao.bernardo@sicoob.com.br">
            </div>
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar E-mail</label>
                <input type="text" class="w-80 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="joao.bernardo@sicoob.com.br">
            </div>
        </div>
        <div class="cadastro-items-left">
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ramal</label>
                <input type="text" class="w-80 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1619">
            </div>
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar Ramal</label>
                <input type="text" class="w-80 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1619">
            </div>
        </div>
        <div class="cadastro-items-left">
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ramal</label>
                <input type="text" class="w-80 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1619">
            </div>
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Telefone</label>
                <input type="text" class="w-80 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="(21) 96486-5208">
            </div>
        </div>
        <div class="cadastro-items-left">
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo de Acesso</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selecionar</option>
                    <option value="0">Comum</option>
                    <option value="1">Admin</option>
                </select>
            </div>
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">PA</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selecionar</option>
                    <option value="Sede">Sede</option>
                    <option value="Américas">Américas</option>
                    <option value="CampoGrande">Campo Grande</option>
                    <option value="Caxias">Caxias</option>
                    <option value="NovaIguaçu">Nova Iguaçu</option>
                    <option value="SãoPaulo">São Paulo</option>
                    <option value="Centro">Centro - Compartilhado</option>
                    <option value="Icaraí">Icaraí - Compartilhado</option>
                </select>
            </div>
        </div>
        <div class="cadastro-items-left">
            <div>
                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Setor</label>
                <select id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Selecionar</option>
                    <option value="Cadastro">Cadastro</option>
                    <option value="Comercial">Comercial</option>
                    <option value="Tecnologia">Tecnologia</option>
                    <option value="Controle">Controle</option>
                    <option value="Financeiro">Financeiro</option>
                    <option value="Credito">Credito</option>
                    <option value="Diretoria">Diretoria</option>
                    <option value="Superintendência">Superintendência</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Secretaria">Secretaria</option>
                </select>
            </div>
        </div>
        <div class="cadastro-items-left">
        <div class="flex items-center">
            <input id="link-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="link-checkbox" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 dark:text-blue-500 hover:underline">terms and conditions</a>.</label>
        </div>
        </div>
    </form>
    </section>

<footer class="relative pt-8 pb-6" style="margin-top: 150px; background-color: black;">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap text-left lg:text-left">
      <div class="w-full lg:w-6/12 px-4">
        <h4 class="text-3xl norma-asap-itens-white-big" style="color: white;">Sicoob Empresas</h4>
        <h5 class="norma-asap-itens-white-small">
          Intranet oficial do Sicoob Empresas.
        </h5>
      </div>
      <div class="w-full lg:w-6/12 px-4">
        <div class="flex flex-wrap items-top mb-6">
          <div class="w-full lg:w-4/12 px-4 ml-auto">
            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Links Importantes</span>
            <ul class="list-unstyled">
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.creative-tim.com/presentation?ref=njs-profile">Inicio</a>
              </li>
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://blog.creative-tim.com?ref=njs-profile">Ramais</a>
              </li>
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.github.com/creativetimofficial?ref=njs-profile">Links</a>
              </li>
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://www.creative-tim.com/bootstrap-themes/free?ref=njs-profile">Chamados</a>
              </li>
            </ul>
          </div>
          <div class="w-full lg:w-4/12 px-4">
            <span class="block uppercase text-blueGray-500 text-sm font-semibold mb-2">Other Resources</span>
            <ul class="list-unstyled">
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://github.com/creativetimofficial/notus-js/blob/main/LICENSE.md?ref=njs-profile">MIT License</a>
              </li>
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/terms?ref=njs-profile">Terms &amp; Conditions</a>
              </li>
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/privacy?ref=njs-profile">Privacy Policy</a>
              </li>
              <li>
                <a class="text-blueGray-600 hover:text-blueGray-800 font-semibold block pb-2 text-sm" href="https://creative-tim.com/contact-us?ref=njs-profile">Contact Us</a>
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

    <script src="../scripts/index.js"></script>
</body>
</html>