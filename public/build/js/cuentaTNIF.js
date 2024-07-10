opcionesNIF.sort();

cuentaT_credito = document.getElementById('cuentaT_credito');
cuentaT_debito = document.getElementById('cuentaT_debito');

opcionesNIF.forEach(function (item) {
    let o = document.createElement("option");
    o.text = item.length > 40 ? item.substring(0, 37) + '...' : item;
    o.value = item;
    cuentaT_debito.appendChild(o);
});

opcionesNIF.forEach(function (item) {
    let o = document.createElement("option");
    o.text = item.length > 40 ? item.substring(0, 37) + '...' : item;
    o.value = item;
    cuentaT_credito.appendChild(o);
});

function agregarFila() {
    var valorSelect = document.getElementById("cuentaT_debito").value;
    var valorSelect1 = document.getElementById("cuentaT_credito").value;

    var tabla2 = document.getElementById("tabla2");
    var nuevaFila = tabla2.insertRow();

    var celda = nuevaFila.insertCell(0);
    var celda1 = nuevaFila.insertCell(1);

    celda.colSpan = 3;
    celda1.colSpan = 3;
    celda.innerHTML = valorSelect === '0' ? '' : valorSelect;
    celda1.innerHTML = valorSelect1 === '0' ? '' : valorSelect1;

    document.getElementById('cuentaT_debito').value = 0;
    document.getElementById('cuentaT_credito').value = 0;
};
