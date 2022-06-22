const openModal = document.querySelector('.show-ingreso');
const modalIngreso = document.querySelector('.modal-ingreso');
const closeModalIngreso = document.querySelector('.modal-cerrar-ingreso')
const openModalPass = document.querySelector('.show-modal-recuperar');
const modalRecuperarPass = document.querySelector('.modal-recuperar-pass');
const closeModalPass = document.querySelector('.modal-cerrar-recuperar');

//esta es una funcion flecha => y realizara la accion cada ves que le hagan click
openModal.addEventListener('click', (e) => {
    //esto es para evitar que salga la almuadilla del href en el buscador
    e.preventDefault();
    modalIngreso.classList.add('show-ingreso');
});
closeModalIngreso.addEventListener('click', (e) => {
    //esto es para evitar que salga la almuadilla del href en el buscador
    e.preventDefault();
    modalIngreso.classList.remove('show-ingreso');
});



//Modal recupracion contraseña

//esta es una funcion flecha => y realizara la accion cada ves que le hagan click
openModalPass.addEventListener('click', (e) => {
    //esto es para evitar que salga la almuadilla del href en el buscador
    e.preventDefault();
    modalRecuperarPass.classList.add('show-modal-recuperar');
});
closeModalPass.addEventListener('click', (e) => {
    //esto es para evitar que salga la almuadilla del href en el buscador
    e.preventDefault();
    modalRecuperarPass.classList.remove('show-modal-recuperar');
});

//FIN Modal recupracion contraseña