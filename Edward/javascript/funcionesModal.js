let cerrar = document.querySelectorAll('.close')[0];
let abrir = document.querySelectorAll('.cta')[0];
let modal = document.querySelectorAll('.modal')[0];
let modalC = document.querySelectorAll('.modal-container')[0];

abrir.addEventListener("click", fuction(e){
    e.preventDefault();
    modalC.style.opacity = '1';
    modalC.style.visibility = 'visible';
    modal.classList.toggle('modal-close');
});

cerrar.addEventListener("click", fuction(){
    modal.classList.toggle("modal-close");

    setTimeout(fuction(){
      modalC.style.opacity = '0';
      modalC.style.visibility = 'hidden';
    },1000)
});
