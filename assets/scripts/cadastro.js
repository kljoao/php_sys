// VALIDAÇÃO COMPLETA DO NOME
validNome = false;
const nomeInput = document.querySelector('.nomeInput');
const nomeNotificacao = document.querySelector('.cadastro-item-nome');

nomeInput.addEventListener("keypress", function(e) {
    if(!checkChar(e)) {
    e.preventDefault();
}
});
function checkChar(e) {
    var char = String.fromCharCode(e.keyCode);
    var pattern = '[a-zA-Z ^~´`óòõãáàéèê]';
    if (char.match(pattern)) {
    return true;
}
}

nomeInput.addEventListener('keyup', () => {
    if(nomeInput.value.length <= 7){
        nomeNotificacao.setAttribute('style', 'display: block;');
        validName = false;
    }
    else{
        nomeNotificacao.setAttribute('style', 'display: none;');
        validName = true;
    }
});
// VALIDAÇÃO COMPLETA DO NOME

