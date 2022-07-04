var mostraSenha = document.getElementById('mostraSenha');
var ocultaSenha = document.getElementById('ocultaSenha');
var inputSenha = document.getElementById('senha');

ocultaSenha.style.display = "none";

mostraSenha.addEventListener('click', () => {
    inputSenha.type = "text";
    mostraSenha.style.display = "none";
    ocultaSenha.style.display = "block";
});

ocultaSenha.addEventListener('click', () => {
    inputSenha.type = "password";
    mostraSenha.style.display = "block";
    ocultaSenha.style.display = "none";
});