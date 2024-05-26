/* code to change the images of the accordeon */
var buttonAccordion = document.querySelectorAll('#buttonAccordion');
buttonAccordion.forEach(button => {
    button.addEventListener('click', ()=>{
        const valueButton = button.getAttribute('data-id');
        var imageAccordion = document.getElementById('imgAccordion');
        switch (valueButton) {
            case 'entrenamiento':
                imageAccordion.src = 'web/images/entrenamiento.webp';
                break;
            case 'alimentacion':
                imageAccordion.src = 'web/images/alimentacion.webp';
                break;
            case 'recetas':
                imageAccordion.src = 'web/images/recetas.jpg';
                break;
            default:
                break;
        }
    })
});

/* Code to log out with AJAX */
document.getElementById('logout-button').addEventListener('click', function() {
    fetch('index.php?accion=logout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Sesión cerrada con éxito');
            window.location.href = 'index.php?accion=inicio';
        } else {
            alert('Error al cerrar sesión');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error en la solicitud de cierre de sesión');
    });
});