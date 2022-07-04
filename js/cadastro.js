var inputSenha = document.getElementById('senha');
var inputConfirmaSenha = document.getElementById('confirmaSenha');
var buttonCadastrarUsuario = document.getElementById('buttonCadastrar');
var formCadastroUsuario = document.getElementById('formCadastroUsuario');

buttonCadastrarUsuario.addEventListener('click', () => {
    event.preventDefault();
    if(inputSenha.value != inputConfirmaSenha.value){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'As senhas não coincidem!', 
            width: '400px'
          })
    }else{
        formCadastroUsuario.submit();
    }
})