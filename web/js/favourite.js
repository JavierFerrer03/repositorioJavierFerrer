/* Code for the exercise favourite action */

let favouriteExerciseOff = document.querySelectorAll('.iconoFavoritoOff');
favouriteExerciseOff.forEach(icono => {
    icono.addEventListener('click', insertExerciseFavourite);
});

function insertExerciseFavourite() {
    let idExercise = this.getAttribute('data-idExercise');
    fetch('index.php?accion=insertExerciseFavourite&id=' + idExercise)
        .then(datos => datos.json())
        .then(respuesta => {
            this.classList.remove('fa-regular');
            this.classList.remove('iconoFavoritoOff');
            this.classList.add('fa-solid');
            this.classList.add('iconoFavoritoOn');
            this.removeEventListener('click', insertExerciseFavourite);
            this.addEventListener('click', quitExerciseFavourite);
        });
}

let favouriteExerciseOn = document.querySelectorAll('.iconoFavoritoOn');
favouriteExerciseOn.forEach(icon => {
    icon.addEventListener('click', quitExerciseFavourite);
});

function quitExerciseFavourite() {
    let idExercise = this.getAttribute('data-idExercise');
    fetch('index.php?accion=deleteExerciseFavourite&id=' + idExercise)
        .then(datos => datos.json())
        .then(respuesta => {
            this.classList.remove('fa-solid');
            this.classList.remove('iconoFavoritoOn');
            this.classList.add('fa-regular');
            this.classList.add('iconoFavoritoOff');
            this.removeEventListener('click', quitExerciseFavourite);
            this.addEventListener('click', insertExerciseFavourite);
        })
}

let favouriteRecipeOff = document.querySelectorAll('.iconoRecipeFavoritoOff');
favouriteRecipeOff.forEach(iconoRecipe => {
    iconoRecipe.addEventListener('click', insertRecipeFavourite);
});

function insertRecipeFavourite() {
    let idRecipe = this.getAttribute('data-idRecipe');
    fetch('index.php?accion=insertRecipeFavourite&id=' + idRecipe)
        .then(datos => datos.json())
        .then(respuesta => {
            this.classList.remove('fa-regular');
            this.classList.remove('iconoRecipeFavoritoOff');
            this.classList.add('fa-solid');
            this.classList.add('iconoRecipeFavoritoOn');
            this.removeEventListener('click', insertRecipeFavourite);
            this.addEventListener('click', quitRecipeFavourite);
        });
}

let favouriteRecipeOn = document.querySelectorAll('.iconoRecipeFavoritoOn');
favouriteRecipeOn.forEach(iconRecipe => {
    iconRecipe.addEventListener('click', quitRecipeFavourite);
});

function quitRecipeFavourite() {
    let idRecipe = this.getAttribute('data-idRecipe');
    fetch('index.php?accion=deleteRecipeFavourite&id=' + idRecipe)
        .then(datos => datos.json())
        .then(respuesta => {
            this.classList.remove('fa-solid');
            this.classList.remove('iconoRecipeFavoritoOn');
            this.classList.add('fa-regular');
            this.classList.add('iconoRecipeFavoritoOff');
            this.removeEventListener('click', quitRecipeFavourite);
            this.addEventListener('click', insertRecipeFavourite);
        })
}