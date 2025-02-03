const formRegister = document.getElementById('formRegister');
const loadingBar = document.querySelector('.loading-bar'); 
const dots = document.querySelectorAll('.loading-bar span');
const barBeforeLoading = document.styleSheets[3].cssRules[7].cssRules[0];
const btnForm = document.getElementById('btnForm');
const count = document.getElementById('count');

function fillOutDots (currentStep){
    let valueCount = count.value

    dots.forEach((dot, index)=>{
        if(index < currentStep){
            dot.classList.add('active');
        }else
        dot.classList.remove('active');
    });

    if(currentStep != 1){
        if(sessionStorage.getItem('controller') == valueCount)
            sessionStorage.setItem("currentStep", currentStep--);
        else{
            let contador = --currentStep;
            barBeforeLoading.style.background = `linear-gradient(to right, #b38972 ${35 * contador}%, #afaeae 10%)`;
        }
    }
}

document.addEventListener("DOMContentLoaded", ()=>{
    let currentStep = sessionStorage.getItem("currentStep") || 1;
    
        fillOutDots(currentStep);
    
    formRegister.addEventListener('submit', ()=>{
        const nextStep = parseInt(currentStep) + 1
        sessionStorage.setItem("currentStep", nextStep);
        sessionStorage.setItem('controller', count.value)
        btnForm.classList.add('sendForm');

        const boxLoader = document.querySelector('.box-loader');
        boxLoader.style.display = 'flex';
    
        setTimeout(() => {
            boxLoader.style.display = 'none';
        }, 2000);
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

// FUNÇÃO PARA REAJUSTAR A SEÇÃO, CASO O USUÁRIO QUEIRA ALTERAR ALGUM VALOR NO CAMPO DE FORMULARIO
dots.forEach(item=>{
    item.addEventListener('click', ()=>{
        let attr = item.getAttribute('data-completude');

        if(attr < count.value){
            sessionStorage.setItem("currentStep", attr);
            window.location.href = "http://localhost/hotel/register/";
        }
    });
});

// FUNÇÕES DE MÁSCARAS DOS FORMULÁRIOS
$('#cpf').mask("999.999.999-99");
$("#rg").mask("99.999.999-9");
$('#data-de-nascimento').mask("99/99/9999");
$("#celular").mask("(99) 9 9999-9999");
$("#cep").mask("00.000-000");

// VALIDAÇÃO DA SENHA DO USUÁRIO NO FRONT-END
const pw = document.querySelector('[name=Password]');
const requirementList = document.querySelectorAll("#instruccions-pw li");

const requirements = [
    {regex: /.{8,20}/, index: 0},
    {regex: /[A-Z]{1,}/, index: 1},
    {regex: /[a-z]{1,}/, index: 2},
    {regex: /[0-9]{1,}/, index: 3},
    {regex: /[^A-Za-z0-9]/, index: 4}
];

pw.addEventListener('keyup', (e)=>{
    requirements.forEach(item =>{
        const isValid = item.regex.test(e.target.value);
        const requirementItem = requirementList[item.index];

        if(isValid){
            requirementItem.classList.add('valid');
            requirementItem.firstElementChild.classList.remove('lucide-x');
            requirementItem.firstElementChild.classList.add('lucide-check');
            requirementItem.firstElementChild.style.color = "#0f0"
            requirementItem.firstElementChild.innerHTML = `<path d="M20 6 9 17l-5-5"/>`
        }else{
            requirementItem.classList.remove('valid');
            requirementItem.firstElementChild.classList.remove('lucide-check');
            requirementItem.firstElementChild.classList.add('lucide-x');
            requirementItem.firstElementChild.style.color = "#f00"
            requirementItem.firstElementChild.innerHTML = `<path d="M18 6 6 18"/><path d="m6 6 12 12"/>`
            e.preventDefault();
        }
    })
});

const inputLogradouro = document.getElementById('logradouro').parentNode.parentNode;
const inputNumberHouse = document.getElementById('nº').parentNode.parentNode;
const inputCep = document.getElementById('cep').parentNode.parentNode;
const inputUf = document.getElementById('uf').parentNode.parentNode;

inputLogradouro.classList.add('w70');
inputNumberHouse.classList.add('w30');
inputCep.classList.add('w50');
inputUf.classList.add('w50');

const eyesPwBtn = document.querySelectorAll(".eye-btn-pw");
let control = true;

eyesPwBtn.forEach(item =>{
    item.addEventListener('click', ()=>{
        let pwField = item.parentNode.childNodes[3].childNodes[3];

        if(control){
            pwField.setAttribute("type", "text");
            item.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-closed"><path d="m15 18-.722-3.25"/><path d="M2 8a10.645 10.645 0 0 0 20 0"/><path d="m20 15-1.726-2.05"/><path d="m4 15 1.726-2.05"/><path d="m9 18 .722-3.25"/></svg>`;
            control = false;
        }else{
            pwField.setAttribute("type", "password");
            item.innerHTML = `<svg  xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>`;
            control = true;
        }
    });
});