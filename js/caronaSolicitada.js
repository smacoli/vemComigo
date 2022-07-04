var selectOrigem = document.getElementById('localOrigem');
var selectDestino = document.getElementById('localDestino');

var inputId = document.getElementById('idcarona');
var inputQuantidadeVagas = document.getElementById('quantidade_vagas');
var buttonCalcularValor = document.getElementById('buttonCalcularValor');
var buttonCadastrar = document.getElementById('buttonCadastrar');
var formReserva = document.getElementById('formReserva');

buttonCalcularValor.addEventListener('click', () => {
    event.preventDefault();
    origemDestino = {
        id: inputId.value,
        origem: selectOrigem.value, 
        destino: selectDestino.value
    }
    enviarDadosParaCalcularValor(origemDestino);
});

function enviarDadosParaCalcularValor(origemDestino){
    var ajax = new XMLHttpRequest();
    var url = "../php/calcularValor.php";

    var origemDestinoJSON = JSON.stringify(origemDestino); 

    ajax.open("POST", url, true);

    ajax.setRequestHeader("Content-Type", "application/json");

    ajax.send(origemDestinoJSON);

    ajax.onreadystatechange = function () {
        if(ajax.readyState === 4 && ajax.status === 200){
            var inputValor = document.getElementById('valor');
            var resposta = this.responseText;
            inputValor.value = resposta;
        }

    }
}

buttonCadastrar.addEventListener('click', () => {
    event.preventDefault();
    console.log(inputQuantidadeVagas.value)
    if(inputQuantidadeVagas.value == 0){
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Não há vagas disponíveis para essa carona!', 
            width: '400px'
        })
    }else{
        formReserva.submit();
    }
});