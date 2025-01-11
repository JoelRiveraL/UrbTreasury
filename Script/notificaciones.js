setInterval(() => {
    fetch('../Forms/getNotificationes.php')
        .then(response => response.json())
        .then(data => {
            const container = document.getElementById('notificaciones');
            container.innerHTML = ''; // Limpia las notificaciones anteriores
            data.forEach(notif => {
                const notifElement = document.createElement('article');
                notifElement.innerHTML = `
                    <p>Tiene una notificación de: ${notif.usuario}, Nombre: ${notif.nombre}</p><br>
                    <hr>
                `;
                container.appendChild(notifElement);
            });
        })
        .catch(error => {
            console.error('Error al obtener las notificaciones:', error);
        });
}, 1000); // Consulta cada 5 segundos
