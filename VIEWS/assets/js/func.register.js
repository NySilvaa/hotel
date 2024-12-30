const formRegister = document.getElementById('formRegister');
const loadingBar = document.querySelector('.loading-bar'); 
const dots = document.querySelectorAll('.loading-bar span');
const barBeforeLoading = document.styleSheets[3].cssRules[5].cssRules[0];
const btnForm = document.getElementById('btnForm');

function fillOutDots (currentStep){
    dots.forEach((dot, index)=>{
        if(index < currentStep){
            dot.classList.add('active');
        }else
        dot.classList.remove('active');
    });

    if(currentStep != 1){
        let contador = --currentStep;
        barBeforeLoading.style.background = `linear-gradient(to right, #b38972 ${35 * contador}%, #afaeae 10%)`;
    }
}

document.addEventListener("DOMContentLoaded", ()=>{
    let currentStep = sessionStorage.getItem("currentStep") || 1;

    fillOutDots(currentStep);
    
    formRegister.addEventListener('submit', ()=>{
        const nextStep = parseInt(currentStep) + 1
        sessionStorage.setItem("currentStep", nextStep);
    });

    let Currentlyvalue = String(currentStep)

    switch (Currentlyvalue) {
        case "1":
            btnForm.innerText = "Start Sign Up";    
        break;

        case "2":
            btnForm.innerText = "You're Going Well";    
        break;

        case "3":
            btnForm.innerText = "Almost There...";    
        break;

        case "4":
            btnForm.innerText = "Finish Sign Up";    
        break;
    
        default:
            break;
    }
});

// FUNÇÕES DE MÁSCARAS DOS FORMULÁRIOS
$('#cpf').mask("999.999.999-99");
$('#data-de-nascimento').mask("99/99/9999");
$("#cep").mask("00.000-000");
$("#telefone-celular").mask("(99) 9 9999-9999");
$("#rg").mask("99.999.999-9")