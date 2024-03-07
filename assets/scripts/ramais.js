document.addEventListener('DOMContentLoaded', function () {
    var searchInput = document.getElementById('default-search');
    var ramaisContainer = document.querySelector('.ramais-container');

    console.log(searchInput); // Verifica se o campo de pesquisa está sendo encontrado
    console.log(ramaisContainer);

    searchInput.addEventListener('input', function () {
        var searchTerm = searchInput.value.trim().toLowerCase();
        var ramalCards = ramaisContainer.querySelectorAll('.ramal-card-container');

        ramalCards.forEach(function (card) {
            var nomeElement = card.querySelector('#nome');
            var setorElement = card.querySelector('#setor');
            var paElement = card.querySelector('#pa');
            var ramalElement = card.querySelector('#ramal');

            console.log(nomeElement, setorElement, paElement, ramalElement); // Adicione essa linha para verificar se os elementos estão sendo encontrados

            if (nomeElement && setorElement && paElement && ramalElement) {
                var nome = nomeElement.textContent.trim().toLowerCase();
                var setor = setorElement.textContent.trim().toLowerCase();
                var pa = paElement.textContent.trim().toLowerCase();
                var ramal = ramalElement.textContent.trim().toLowerCase();

                if (nome.includes(searchTerm) || setor.includes(searchTerm) || pa.includes(searchTerm) || ramal.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            } else {
                console.error('Elementos não encontrados');
            }
        });
    });
});
