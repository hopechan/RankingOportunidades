function buscarEstudiante(str) {
    try {
        xhr = new XMLHttpRequest(); //para cualquier navegador
    } catch (e) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");//solo IE :v
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            var resultado = document.getElementById('main');
            resultado.innerHTML = xhr.responseText;
            console.log(resultado);
        }
    }

    var parametro = document.getElementById("txtBusqueda").value;
    var str = "?busqueda=" + parametro;
    xhr.open("GET", "./buscarEstudiante.php" + str, true)
    xhr.send();
}

function buscar(str) {
    fetch('/vista/buscarEstudiante.php?busqueda='+str)
        .then(function(respuesta) {
            return respuesta.formData();
        })
        .then(function(respuesta){
            console.log(repuesta)
        })
}