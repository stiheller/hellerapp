/* Sumar dos números. */
function sumar () {
    var numero1 = document.getElementById("numero1").value;
    var numero2 = document.getElementById("numero2").value;

    var suma = numero1 + numero2;

    document.getElementById('saldo').innerHTML = suma;
}
