var divAddNovoLocal = document.getElementById('addNovoLocal');
var selectLocalItinerario = document.getElementById('locaisItinerario');
var buttonCadastrarLocal = document.getElementById('buttonCadastrarLocal');
var novoLocal = document.getElementById('novoLocal');
/* var divItinerario = document.getElementById('itinerario'); */
var inputItinerario = document.getElementById('itinerario');

divAddNovoLocal.style.display = "none";

console.log("Entrei!!!");

selectLocalItinerario.addEventListener('change', () => {
    console.log(selectLocalItinerario.value);
    
    if(selectLocalItinerario.value == "Outro"){
        divAddNovoLocal.style.display = "block";
    }else{
        divAddNovoLocal.style.display = "none";
    }
    
});

var itinerario = [];


buttonCadastrarLocal.addEventListener('click', () => {
    event.preventDefault();
    console.log("Hello!!!");
    if(selectLocalItinerario.value == "Outro"){
        console.log(selectLocalItinerario.value);
        itinerario.push(novoLocal.value);
        console.log("Local tá sendo lido?" + local.value);
        local = {
            nome: novoLocal.value
        }
        console.log(novoLocal.nome);
        salvarLocal(local);
        addLocalItinerarioCarona(local);
    }else{
        itinerario.push(selectLocalItinerario.value);
        local = {
            nome: selectLocalItinerario.value
        }
        addLocalItinerarioCarona(local);
    }
    console.log(itinerario);
    var itinerarioFormatado;
    for(var i = 0; i < itinerario.length; i++){
        itinerarioFormatado += ", " + itinerario[i];
    }
    
    itinerarioFormatado = itinerario.filter(function (i) {
        return i;
      });
    inputItinerario.value = itinerarioFormatado;
});

function salvarLocal(local){
    var ajax = new XMLHttpRequest();
    var url = "../php/salvarLocal.php";

    var localJSON = JSON.stringify(local); 

    console.log(localJSON);
    
    ajax.open("POST", url, true);

    ajax.setRequestHeader("Content-Type", "application/json");

    ajax.send(localJSON);

    ajax.onreadystatechange = function () {
        if(ajax.readyState === 4 && ajax.status === 200){
            
        }

    }

}

function addLocalItinerarioCarona(local){
    var ajax = new XMLHttpRequest();
    var url = "../php/salvarItinerario.php";

    var localJSON = JSON.stringify(local); 

    ajax.open("POST", url, true);

    ajax.setRequestHeader("Content-Type", "application/json");

    ajax.send(localJSON);

    ajax.onreadystatechange = function () {
        if(ajax.readyState === 4 && ajax.status === 200){
            
        }

    }

}

