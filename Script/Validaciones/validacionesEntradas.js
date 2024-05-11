document.getElementById('nombre').addEventListener('input', function () {
    this.value = this.value.replace(/[^a-zA-Z]/g, ''); // Permitir solo letras
    this.value = this.value.replace(/[0-9]/g, ''); // Eliminar números
});

document.getElementById('apellido').addEventListener('input', function () {
    this.value = this.value.replace(/[^a-zA-Z]/g, ''); // Permitir solo letras
    this.value = this.value.replace(/[0-9]/g, ''); // Eliminar números
});



