// VALIDAÇÃO COMPLETA DO NOME
validName = false
const nomeInput = document.querySelector('.nomeInput');
const nomeNotificacao = document.querySelector('.cadastro-item-nome');

nomeInput.addEventListener("blur", function(e) {
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

nomeInput.addEventListener('blur', () => {
    if(nomeInput.value.length <= 7){
        nomeNotificacao.setAttribute('style', 'display: block;');
        validName = false
    }
    else{
        validName = true
        nomeNotificacao.setAttribute('style', 'display: none;');
    }
});

// VALIDAÇÃO COMPLETA DO NOME

const cpfInput = document.querySelector('#cpf');
    const errorMessage = document.querySelector('.cadastro-item-cpf');

    cpfInput.addEventListener('blur', applyCPFFormat);
    cpfInput.addEventListener('blur', validateCPF);

    function applyCPFFormat() {
      let cpf = cpfInput.value.replace(/\D/g, '');

      if (cpf.length > 3 && cpf.length <= 6) {
        cpf = cpf.replace(/(\d{3})/, '$1.');
      } else if (cpf.length > 6 && cpf.length <= 9) {
        cpf = cpf.replace(/(\d{3})(\d{3})/, '$1.$2.');
      } else if (cpf.length > 9) {
        cpf = cpf.replace(/(\d{3})(\d{3})(\d{3})/, '$1.$2.$3-');
      }

      cpfInput.value = cpf;
    }

    function validateCPF() {
        const cpf = cpfInput.value.replace(/\D/g, '');
      
        if (cpf.length !== 11 || !/^\d{11}$/.test(cpf)) {
          showErrorMessage();
          return;
        }
      
        const digits = cpf.split('').map(Number);
      
        const isValidChecksum =
          digits[9] === calculateDigit(cpf, 9) && digits[10] === calculateDigit(cpf, 10);
      
        if (!isValidChecksum) {
          showErrorMessage();
          return;
        }
        hideErrorMessage();
      }

    function hasRepeatedDigits(cpf) {
      return /^(.)\1+$/.test(cpf);
    }

    function isValidChecksum(cpf) {
      const digits = cpf.split('').map(Number);
      const checksum = digits.slice(0, 9).reduce((acc, digit, index) => acc + digit * (10 - index), 0) % 11;
      const validChecksums = [0, 1].includes(checksum >= 2 ? 11 - checksum : checksum);

      return validChecksums && digits[9] === calculateDigit(cpf, 9) && digits[10] === calculateDigit(cpf, 10);
    }

    function calculateDigit(cpf, position) {
        const digits = cpf.split('').map(Number);
        const checksum = digits
          .slice(0, position)
          .reduce((acc, digit, index) => acc + digit * (position + 1 - index), 0) % 11;
      
        return checksum < 2 ? 0 : 11 - checksum;
      }

    function showErrorMessage() {
        validCPF = false;
        errorMessage.style.display = 'block';
    }

    function hideErrorMessage() {
        validCPF = true;
        errorMessage.style.display = 'none';
    }


// Validador E-MAIL

  const emailInvalido = document.querySelector('.cadastro-item-email');
    validEmail = false

  email.addEventListener('blur', validacaoEmail);
  
  function validacaoEmail() {
      const emailValue = email.value;
      const usuario = emailValue.substring(0, emailValue.indexOf("@"));
      const dominio = emailValue.substring(emailValue.indexOf("@") + 1, emailValue.length);
  
      if (
          (usuario.length >= 3) &&
          (dominio.length >= 3) &&
          (usuario.search("@") == -1) &&
          (dominio.search("@") == -1) &&
          (usuario.search(" ") == -1) &&
          (dominio.search(" ") == -1) &&
          (dominio.search(".com") != -1) &&
          (dominio.indexOf(".br") >= 1) &&
          (dominio.lastIndexOf(".") < dominio.length - 1)
      ) {
          emailInvalido.style.display = 'none';
          validEmail = true;
      } else {
          emailInvalido.style.display = 'block';
          validEmail = false;
      }
  }
  
//Validador E-MAIL

// Valid Confirm E-mail
const confirmEmailError = document.querySelector('.cadastro-item-confirmEmail');

function validConfirmEmail(){
    if(email !== confirmEmail){
        confirmEmailError.style.display = 'block';
    }
    else{
        confirmEmailError.style.display = 'none';
    }
}

confirmEmail.addEventListener('blur', validConfirmEmail);
// Valid Confirm E-mail

// Validador Telefone
const handlePhone = (event) => {
    let telefone = event.target
    telefone.value = phoneMask(telefone.value)
  }
  
  const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    return value
  }
// Validador Telefone

const btnEnviar = document.getElementById('btnEnviar');

btnEnviar.addEventListener('click', (e) => {
    e.preventDefault();

    const nome = document.querySelector('input[name="nome"]').value;
    const cpf = document.querySelector('input[name="cpf"]').value;
    const email = document.querySelector('input[name="email"]').value;
    const ramal = document.querySelector('input[name="ramal"]').value;
    const senha = document.querySelector('input[name="senha"]').value;
    const telefone = document.querySelector('input[name="telefone"]').value;
    const acesso = document.querySelector('select[name="acesso"]').value;
    const pa = document.querySelector('select[name="pa"]').value;
    const setor = document.querySelector('select[name="setor"]').value;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../../app/user_cadastro.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                const response = xhr.responseText;
                if (response.includes('Erro')) {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: response,
                    });
                } else {
                    Swal.fire({
                        title: "Usuário cadastrado!",
                        text: "Deseja cadastrar outro colaborador?",
                        icon: "success",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        cancelButtonText: "Cancelar",
                        confirmButtonText: "Sim, desejo!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }
                    });
                }
            } else {
                console.error('Houve um erro ao processar a requisição.');
            }
        }
    };

    xhr.send(`nome=${nome}&cpf=${cpf}&email=${email}&ramal=${ramal}&senha=${senha}&telefone=${telefone}&acesso=${acesso}&pa=${pa}&setor=${setor}&cadastrar=1`);
});