document.getElementById('monto').addEventListener('input', function() {
    var caracteresAEliminar = /[".,?\-()%$#@!^&*{}\[\]:;]/g;
    this.value = this.value.replace(caracteresAEliminar, '');

    var monto = parseInt(this.value);
    if (monto < 1) {
        this.value = 1;
    }
    if (monto > 500) {
        this.value = 500;
    }
});