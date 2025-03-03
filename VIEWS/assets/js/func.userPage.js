const btnAside = document.querySelectorAll(".btn-aside");
const aside = document.querySelector("aside");
const asideActive = document.querySelector("aside.active");
const infoUser = document.querySelector(".info-user");
let controllerAsideMenu = true;

const menuActive = ()=>{
    aside.style.width = "0px";
    aside.style.overflow = "hidden";
    asideActive.style.display = "block";
    asideActive.style.opacity = "0";
    let btnAsideActive = document.querySelector("aside.active .btn-aside");

    setTimeout(() => {
        asideActive.style.width = "50px";
        asideActive.style.opacity = "1";
        asideActive.style.overflow = "visible";
    }, 700);

    infoUser.style.width = `calc(100% - 50px)`;
    btnAsideActive.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-right"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>`;

    controllerAsideMenu = false;
};

const menuDisabled = ()=>{
    asideActive.style.width = "0px";
    asideActive.style.opacity = "0";
    asideActive.style.overflow = "hidden";

    let windowWidth = $(window).width();
    
    setTimeout(() => {
        aside.style.width = (windowWidth > 860) ? "300px" : "250px";
        aside.style.overflow = "visible";
        infoUser.style.width = (windowWidth > 860) ? `calc(100% - 300px)` : `calc(100% - 250px)`;
        btnAside[0].innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>`;
    }, 700);

    controllerAsideMenu = true;
}

btnAside.forEach(item =>{
    item.addEventListener("click", (e)=>{
        e.preventDefault();
    
        (controllerAsideMenu) ? menuActive() : menuDisabled();
    });
});

window.addEventListener("resize", ()=>{
    let windowWidth = $(window).width();

    if(windowWidth <= 860)
        menuActive(); 
});

window.onload =  ()=>{
    let windowWidth = $(window).width();

    if(windowWidth <= 860)
        menuActive(); 
};