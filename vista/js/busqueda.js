function buscarEstudiante() {
    try {
        xhr = new XMLHttpRequest(); //para cualquier navegador
    } catch (e) {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");//solo IE :v
    }
    xhr.onreadystatechange = function () {
        if (xhr.readyState== 4) {
            var resultado = document.getElementById('resultado');
            resultado.innerHTML = xhr.responseText;
        }
    }

    var parametro = document.getElementById("txtBusqueda").value;
    var str = "?busqueda=" + parametro;
    xhr.open("GET", "./buscarEstudiante.php" + str, true)
    xhr.send();
}
