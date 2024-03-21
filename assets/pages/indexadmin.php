<?php
    include('../../app/conection.php');
    include('../../app/protection.php');
    include('../../app/logout.php');
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
                <a href="#ramais">
                    <li class="header-item norma-asap-itens-white-small">Ramais</li>
                </a>
                <a href="#chamados">
                    <li class="header-item norma-asap-itens-white-small">Chamados</li>
                </a>
                <a href="#links">
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

    <main class="index-main">
        <div>
            <a href="" class="index-inovacao norma-asap-itens-white-small">
                <button class="new-btn norma-asap-itens-white-small" style="color: white !important;">Novo</button>
                Conheça o Novo Sicoob Empresas! <i class="fa-solid fa-arrow-right inovacao-arrow"></i>
            </a>
        </div>

        <div class="flex justify-center items-center">
            <img src="../img/logo-prince.png" alt="" class="index-logo">
        </div>    
        <p class="norma-asap-itens-white-medium">Bem vindo ao sistema de integração do Sicoob Empresas.<br> Aqui você pode acessar todos os principais sistemas da empresa.</p>
        <div class="index-btn">
            <button class="norma-asap-itens-white-small btnPrincipal" style="color: white !important;">Acessar Tutoriais</button>
            <button class="norma-asap-itens-white-small btnSecond" style="color: white !important;">Relatar Problemas</button>
        </div>
    </main>

    <section class="index-information-container">
        <span class="index-information-separador"></span>
        <div class="index-information">
            <div>
                <h2 class="norma-asap-itens-white-small" style="color: #FFFFFF; font-size: 20px;">Mais Otimizado</h1>
                <p class="norma-asap-itens-white-small">Sistema Integrado</p>
            </div>
            <div>
                <h2 class="norma-asap-itens-white-small" style="color: #FFFFFF; font-size: 20px;">Mais Funcionalidades</h2>
                <p class="norma-asap-itens-white-small">Intranet Completa</p>
            </div>
            <div>
                <h2 class="norma-asap-itens-white-small" style="color: #FFFFFF; font-size: 20px;">Novas Funções</h2>
                <p class="norma-asap-itens-white-small">Totalmente Completo</p>
            </div>
        </div>
        <div style="text-align: center;">
            <span class="index-information-separador"></span>
        </div>
    </section>

    <section class="apresentacao-container">
        <div class="apresentacao-sistema">
            <h1 class="norma-asap-itens-white-big" style="color: white;">Um novo sistema integrado e amigável</h1>
            <p class="norma-asap-itens-white-small" style="color: rgba(255, 255, 255, 0.582);">Intranet que conecta tudo a todos.</p>
        </div>

        <div class="apresentacao-items">

            <div class="apresentação-i-contorno-left">
                <h1 class="norma-asap-itens-white-big">100%</h1>
                <p class="norma-asap-itens-white-small">Novo</p>
            </div>
            <div class="apresentação-i">
                <h1 class="norma-asap-itens-white-big">43%</h1>
                <p class="norma-asap-itens-white-small">Mais otimizado</p>
            </div>
            <div class="apresentação-i">
                <h1 class="norma-asap-itens-white-big">6</h1>
                <p class="norma-asap-itens-white-small">Novas funcionalidades</p>
            </div>
            <div class="apresentação-i-contorno-right">
                <h1 class="norma-asap-itens-white-big">6</h1>
                <p class="norma-asap-itens-white-small">Novas funcionalidades</p>
            </div>

        </div>
    </section>

    <section id="chamados" class="index-ti-container">
        <div>
            <h1 class="norma-asap-itens-white-big" style="color: white;">Suporte Interno Completo<br>ao Sistema</h1>
            <p class="norma-asap-itens-white-small" style="color: rgba(255, 255, 255, 0.582); margin-top: 10px;">Abra um chamado com a equipe de TI<br>para que o seu problema seja solucionado<br>o mais rápido o possível.</p>
            <div style="margin-top:10px;">
                <ul class="ti-ul">
                    <span class="ti-li ti-separador"></span>
                    <li class="ti-li norma-asap-itens-white-small" style="color: rgba(255, 255, 255, 0.582);"><i class="fa-solid fa-envelope" style="color: white;"></i>Contato via E-mail</li norma-asap-itens-white-small>
                    <span class="ti-li ti-separador"></span>
                    <li class="ti-li norma-asap-itens-white-small" style="color: rgba(255, 255, 255, 0.582);"><i class="fa-brands fa-rocketchat" style="color: white;"></i>SLA de até 2 horas</li norma-asap-itens-white-small>
                    <span class="ti-li ti-separador"></span>
                    <li class="ti-li norma-asap-itens-white-small" style="color: rgba(255, 255, 255, 0.582);"><i class="fa-solid fa-chart-line" style="color: white;"></i>Desenvolvimento de Processos</li norma-asap-itens-white-small>
                    <span class="ti-li ti-separador"></span>
                    <li class="ti-li norma-asap-itens-white-small" style="color: rgba(255, 255, 255, 0.582);"><i class="fa-solid fa-network-wired" style="color: white;"></i>Controle de Rede</li norma-asap-itens-white-small>
                    <span class="ti-li ti-separador"></span>
                </ul>
                <div class="index-ramais-buttons">
                    <a href="https://app.pipefy.com/public/form/qzIn9XqR"><button class="norma-asap-itens-white-small tiBtn" style="color: white !important;">Abrir Chamado</button></a>
                </div>
            </div>
        </div>
        <div>
            <img src="../img/chamados.svg" alt="" width="520px" class="ti-img">
        </div>
    </section>

        <section class="index-ramal-container" id="ramais">
        <div class="index-ramal">
            <div>
                <h1 class="norma-asap-itens-white-big" style="color: white;">Com Algumas Urgência?<br>Use nossos <span class="ramais">Ramais</span></h1>
                <p class="norma-asap-itens-white-small" style="color: rgba(255, 255, 255, 0.582); margin-top: 10px;">O ramal só deverá ser usado em último caso (emergências),<br>utilize outras formas de contato como e-mail ou teams.</p>
                <div class="index-ramais-buttons">
                    <a href="ramaisadmin.php"><button class="norma-asap-itens-white-small btnPrincipal" style="color: white !important;">Acessar Ramais</button></a>
                    <button class="norma-asap-itens-white-small btnSecond" style="color: white !important;">Relatar Problemas</button>
                </div>
            </div>
            <div>
                <img class="ramalimg"src="../img/ramal.svg" alt="" width="520px">
            </div>
        </div>
    </section>
    <section id="links">
        <div class="links-container">
            <h1 class="norma-asap-itens-white-big" style="color: white;">Encontre aqui o que procura</h1>
            <p class="norma-asap-itens-white-small">Procurando aquele link e não consegue encontrar? Aqui você encontra!</p>
        </div>

        <div class="links-items">

            <div class="big-links max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <i class="found-icons fa-solid fa-building-columns"></i>
                <a href="https://gestaodepessoas.sicoob.com.br/">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Cursos</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Acesso direto ao universisdade Sicoob, onde você acessa todos os seus cursos.</p>
                <hr>
                <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline" style="margin-top: 10px;">
                    Acessar site
                    <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                    </svg>
                </a>
            </div>

            <div class="big-links max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <i class="found-icons fa-solid fa-ticket-simple"></i>
                <a href="https://atendimento.sisbr.coop.br/tas/public/ssp/">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Portal CCS</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Portal para abertura de chamados junto a Central, ou nossa Confederação.</p>
                <hr>
                <a href="#" class="inline-flex font-medium items-center text-blue-600 hover:underline" style="margin-top: 10px;">
                    Acessar site
                    <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                    </svg>
                </a>
            </div>

            <div class="big-links max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <i class="found-icons fa-solid fa-money-check-dollar"></i>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Sipagnet</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Link de acesso direto para a plataforma Sipagnet.</p>
                <hr>
                <a href="https://web.sipag.com.br/sipagnet/emi/site" class="inline-flex font-medium items-center text-blue-600 hover:underline" style="margin-top: 10px;">
                    Acessar site
                    <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                    </svg>
                </a>
            </div>
            <br>
            <div class="big-links max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <i class="found-icons fa-solid fa-gear"></i>
                <a href="#">
                    <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Pipefy</h5>
                </a>
                <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">Acompanhamento de processos gerais internos da empresa.</p>
                <hr>
                <a href="https://app.pipefy.com/organizations/110391" class="inline-flex font-medium items-center text-blue-600 hover:underline" style="margin-top: 10px;">
                    Acessar site
                    <svg class="w-3 h-3 ms-2.5 rtl:rotate-[270deg]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778"/>
                    </svg>
                </a>
            </div>
        </div>
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

    <script src="../scripts/index.js"></script>
</body>
</html>