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