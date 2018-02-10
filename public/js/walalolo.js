function muestra_oculta(id){
    if (document.getElementById){ //se obtiene el id
        let form = document.getElementById(id); //se define la variable "form" igual a nuestro div
        form.style.display = (form.style.display === 'none') ? 'block' : 'none'; //damos un atributo display:none que oculta el div
    }
}
/*
Hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente
 */
window.onload = function(){
    muestra_oculta('reviews');
};

