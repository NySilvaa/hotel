
const formRegister = document.getElementById('formRegister');
const loadingBar = document.querySelector('.loading-bar'); 
const barBeforeLoading = document.styleSheets[3].cssRules[4].cssRules[0];
const dots = document.querySelectorAll('.loading-bar span');
let attr = loadingBar.getAttribute('data-completude');
let control = 0;

formRegister.addEventListener('submit', ()=>{
    window.addEventListener('load', function(){
        checkAttr();
    })
})


const checkAttr = ()=>{
    if(attr > 100)
        attr = 100
    else{        
        fillOutDots();
        loadingBar.setAttribute('data-completude', Number(attr) +25);
        attr = loadingBar.getAttribute('data-completude')
    }
};

const fillOutDots = ()=>{
    if(control < 4){
        dots[control].classList.add('active');
        barBeforeLoading.style.background = `linear-gradient(to right, #b38972 ${35 * control}%, #afaeae 10%)`
        control++;
    }
}


