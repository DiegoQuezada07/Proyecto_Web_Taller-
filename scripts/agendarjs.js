const slidePage = document.querySelector(".slide-page");
const nextBtnFirst = document.querySelector(".firstNext");
const prevBtnSec = document.querySelector(".prev-1");
const nextBtnSec = document.querySelector(".next-1");
const prevBtnThird = document.querySelector(".prev-2");
const nextBtnThird = document.querySelector(".next-2");
const prevBtnFourth = document.querySelector(".prev-3");
const submitBtn = document.querySelector(".submit");
const progressText = document.querySelectorAll(".step p");
const progressCheck = document.querySelectorAll(".step .check");
const bullet = document.querySelectorAll(".step .bullet");
let current = 1;

const nombreinput = document.getElementById("nombre");
const apellidoinput = document.getElementById("apellido");
const correoinput = document.getElementById("correo");
const fonoinput = document.getElementById("fono1");
const fono2input = document.getElementById("fono2");

const fechaIinput = document.getElementById("fecha_inicio");
const fechaTinput = document.getElementById("fecha_termino");
const diasarrendadoslbl = document.getElementById("dias");


// Cambia la fecha minima de termino cuando la fecha de inicio es cambiada
fechaIinput.addEventListener("focusout", (e)=>{
  const value = e.currentTarget.value;  
  fechaTinput.setAttribute('min', value);
});


// devuelve el total de dias arrendado obteniendo la diferencia entre fechaI y fechaT
fechaTinput.addEventListener("focusout", (e)=>{
  let array_fi = fechaIinput.value.split('-');
  let fi = new Date(array_fi[0], array_fi[1], array_fi[2])
  let array_ft = e.currentTarget.value.split('-'); 
  let ft = new Date(array_ft[0],array_ft[1],array_ft[2]);
  let diftime = ft.getTime() - fi.getTime();
  let difdays = diftime / (1000 * 3600 * 24);
diasarrendadoslbl.innerHTML = difdays; 
  console.log(difdays);
});



nextBtnFirst.addEventListener("click", function (event) {
  let nombrevalor = nombreinput.value;
  let apellidovalor = apellidoinput.value;

  // revisa si algun input esta vacio
  if (nombrevalor == "" || apellidovalor == "") {
    event.preventDefault();
    if (nombrevalor == "") {
      nombreinput.style.borderColor = "red";
    } else {
      nombreinput.style.borderColor = "lightgrey";
    }

    if (apellidovalor == "") {
      apellidoinput.style.borderColor = "red";
    } else {
      apellidoinput.style.borderColor = "lightgrey";
    }
  } else {
    nombreinput.style.borderColor = "lightgrey";
    apellidoinput.style.borderColor = "lightgrey";
    console.log("success");
    event.preventDefault();
    slidePage.style.marginLeft = "-25%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  }
});

nextBtnSec.addEventListener("click", function (event) {
  let correovalor = correoinput.value;
  let fonovalor = fonoinput.value;
  let fono2valor = fono2input.value;

  // revisa si algun input esta vacio
  if (!ValidateEmail(correovalor) || fonovalor == "" || fono2valor == "") {
    if (!ValidateEmail(correovalor)) {
      correoinput.style.borderColor = "red";
    } else {
      correoinput.style.borderColor = "lightgrey";
    }

    if (fonovalor == "") {
      fonoinput.style.borderColor = "red";
    } else {
      fonoinput.style.borderColor = "lightgrey";
    }

    if (fono2valor == "") {
      fono2input.style.borderColor = "red";
    } else {
      fono2input.style.borderColor = "lightgrey";
    }

    event.preventDefault();
  } else {
    correoinput.style.borderColor = "lightgrey";
    fonoinput.style.borderColor = "lightgrey";
    fono2input.style.borderColor = "lightgrey";

    event.preventDefault();
    slidePage.style.marginLeft = "-50%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  }
});
nextBtnThird.addEventListener("click", function (event) {
  let fechaIvalor = fechaIinput.value;
  let fechaTvalor = fechaTinput.value;

  // revisa si algun input esta vacio
  if (fechaIvalor == "" || fechaTvalor == "") {
    if (fechaIvalor == "") {
      fechaIinput.style.borderColor = "red";
    } else {
      fechaIinput.style.borderColor = "lightgrey";
    }
    if (fechaTvalor == "") {
      fechaTinput.style.borderColor = "red";
    } else {
      fechaTinput.style.borderColor = "lightgrey";
    }

   

    event.preventDefault();
  } else {
    fechaIinput.style.borderColor = "lightgrey";
    fechaTinput.style.borderColor = "lightgrey";

    event.preventDefault();
    slidePage.style.marginLeft = "-75%";
    bullet[current - 1].classList.add("active");
    progressCheck[current - 1].classList.add("active");
    progressText[current - 1].classList.add("active");
    current += 1;
  }
});

submitBtn.addEventListener("click", function () {
  bullet[current - 1].classList.add("active");
  progressCheck[current - 1].classList.add("active");
  progressText[current - 1].classList.add("active");
  current += 1;
});

prevBtnSec.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "0%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnThird.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-25%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});
prevBtnFourth.addEventListener("click", function (event) {
  event.preventDefault();
  slidePage.style.marginLeft = "-50%";
  bullet[current - 2].classList.remove("active");
  progressCheck[current - 2].classList.remove("active");
  progressText[current - 2].classList.remove("active");
  current -= 1;
});

function ValidateEmail(mail) 
{
 if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
  {
    return (true)
  }
    
    return (false)
};