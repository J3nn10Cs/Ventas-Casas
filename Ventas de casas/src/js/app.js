const alerta = document.querySelector('.alerta');
const btnsubmit = document.querySelector('.mandar');

document.addEventListener('DOMContentLoaded',function(){
    //Cargar el html
    eventListeners();
    darkMode();
    Alerta();
    btnsubmit.addEventListener('click', Alerta)
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

    //Mostrar campos adicionales => por atributo
    const ContactMethod = document.querySelectorAll('input[name="contacto[contacto]"]')

    ContactMethod.forEach(input=> input.addEventListener('click',ShowContactMethod))
}

function navegationResponsive(){
    const navegacion = document.querySelector('.navegacion');

    navegacion.classList.toggle('mostrar');
}

function ShowContactMethod(e){
    const ContactDiv = document.querySelector('#contacto')

    if(e.target.value === 'telefono'){
        ContactDiv.innerHTML = `
            <input type="tel" placeholder="Tu número" id="telefono" name="contacto[telefono]" required>

            <p>Eligió Telefono, elija fecha y hora</p>
            
            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="contacto[fecha]">
                    
            <label for="hora">Hora</label>
            <input type="time" id="hora" min="09:00" max="18:00" name="contacto[hora]">
        `;
    }else{
        ContactDiv.innerHTML = `
            <input type="email" placeholder="Tu email" id="email" name="contacto[email]" required> 


        `;
    }
}

const Alerta = (() => {
    alerta.classList.add('alerta', 'error');
    setTimeout(()=>{
        alerta.classList.remove('alerta', 'error', 'exito');
        alerta.innerHTML = '';
    },3000);
})