document.addEventListener('DOMContentLoaded',function(){
    //Cargar el html
    eventListeners();
    darkMode();
    //Alerta()
});

function darkMode(){
    const icon = document.querySelector("#icon");
    const preferencia = window.matchMedia('(prefers-color-scheme: dark)');

    //console.log(preferencia.matches);

    if(preferencia.matches){
        document.body.classList.add('dark-mode');
    }else{
        document.body.classList.remove('dark-mode');
    }

    preferencia.addEventListener('change',function(){
        if(preferencia.matches){
            document.body.classList.add('dark-mode');
        }else{
            document.body.classList.remove('dark-mode');
        }
    })

    icon.addEventListener('click', function(){
        document.body.classList.toggle('dark-mode');
        if(document.body.classList.contains('dark-mode')){
            localStorage.setItem("modo-oscuro", "true");
            icon.className = "fa-regular fa-sun fa-xl";
        }else{
            localStorage.setItem("modo-oscuro", "false");
            icon.className = "fa-regular fa-moon fa-xl";
        }
    })

    //Obtener el modo del color actual
    if (localStorage.getItem("modo-oscuro") === "true") {
        document.body.classList.add("dark-mode");
        icon.className = "fa-regular fa-sun fa-xl";
      } else {
        document.body.classList.remove("dark-mode");
        icon.className = "fa-regular fa-moon fa-xl";
      }
}

function eventListeners(){
    const mobileMenu = document.querySelector('.mobile-menu');

    mobileMenu.addEventListener('click',navegationResponsive);
}

function navegationResponsive(){
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

// function Alerta(){
//     const alerta = Document.querySelector('.alerta error');

//     setTimeout(()=>{
//         alerta.remove()
//     },3000);
// }