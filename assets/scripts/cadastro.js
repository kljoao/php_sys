// PUXANDO OS INPUTS SEM VALIDADORES
const pa = document.querySelector('#pa');
const setor = document.querySelector('#setor');
const acesso = document.querySelector('#acesso');

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
validCPF = false;

const cpfInput = document.querySelector('#cpf');
    const errorMessage = document.querySelector('.cadastro-item-cpf');

    cpfInput.addEventListener('keypress', applyCPFFormat);
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
        validCPF = true;
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
      errorMessage.style.display = 'block';
    }

    function hideErrorMessage() {
      validCPF = true;
      errorMessage.style.display = 'none';
    }


// Validador E-MAIL

  const emailInvalido = document.querySelector('.cadastro-item-email');
  const email = document.querySelector('#email');
  validEmail = false
  
  email.addEventListener('keyup', validacaoEmail);
  
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
          emailInvalido.style.color = 'red';
          validEmail = false;
      }
  }
  
//Validador E-MAIL

// Valid Confirm E-mail
const confirmEmail = document.querySelector('#confirmEmail');
const confirmEmailError = document.querySelector('.cadastro-item-confirmEmail');

function validConfirmEmail(){
    if(email !== confirmEmail){
        confirmEmailError.style.display = 'block';
        validEmail = false;
    }
    else{
        validEmail = true;
    }
}

confirmEmail.addEventListener('keypress', validConfirmEmail);
// Valid Confirm E-mail

// Validador Ramal
const ramal = document.querySelector('#ramal')
const ramalError = document.querySelector('.cadastro-item-ramal');
validRamal = false

ramal.addEventListener("keypress", function(e) {
    if(!checkChar(e)) {
        e.preventDefault();
        ramalError.style.display = 'block';
        validRamal = false;
}
});

function checkChar(e) {
    var char = String.fromCharCode(e.keyCode);
    var pattern = '[0-9]';
    if (char.match(pattern)) {
        validRamal = true;
        ramalError.style.display = 'none';
        return true;
    }
}

// Validador Ramal

// Validador Confirma Ramal
const confirmRamal = document.querySelector('#confirmRamal')
const confirmRamalError = document.querySelector('.cadastro-item-confirmRamal');
validRamal = false

confirmRamal.addEventListener("keypress", function(e) {
    if(!checkChar(e)) {
        e.preventDefault();
        confirmRamalError.style.display = 'block';
        validRamal = false;
}
    else{
        validRamal = true;
    }
});

confirmRamal.addEventListener('keypress', () => {
    if(confirmEmail !== ramal){
        confirmRamalError.style.display = 'block';
        validRamal = false;
    }
    else{
        validRamal = true;
        confirmRamalError.style.display = 'none;'
    }
})

function checkChar(e) {
    var char = String.fromCharCode(e.keyCode);
    var pattern = '[0-9]';
    if (char.match(pattern)) {
        validRamal = true;
        confirmRamalError.style.display = 'none';
        return true;
    }
}

// Validador Confirma Ramal

// Validador Telefone
validTelefone = false;
const handlePhone = (event) => {
    let telefone = event.target
    telefone.value = phoneMask(telefone.value)
  }
  
  const phoneMask = (value) => {
    if (!value) return ""
    value = value.replace(/\D/g,'')
    value = value.replace(/(\d{2})(\d)/,"($1) $2")
    value = value.replace(/(\d)(\d{4})$/,"$1-$2")
    validTelefone = true;
    return value
  }

// Validador Telefone


function cadastrar(){
    if(validName && validCPF && validEmail && validRamal == true){
        const Data = {
            Nome: nomeInput.value,
            CPF: cpfInput.value,
            PA: pa.value,
            Setor: setor.value,
            Acesso: acesso.value
    };
}
}

$('form').on('submit', (e) => {
    if(validName && validCPF && validEmail && validRamal == true){
        e.preventDefault()
    }
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Por favor, verifique os campos e tente novamente.',
    })
})