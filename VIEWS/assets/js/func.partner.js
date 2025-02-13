window.onload = function(){
    const boxLoader = document.querySelector('.box-loader');
    boxLoader.style.display = 'flex';

    setTimeout(() => {
        boxLoader.style.display = 'none';
    }, 2000);
};

const ItemsnavMenu = document.querySelectorAll("#nav-menu li a");
const url = location.href.split("/");

ItemsnavMenu.forEach(item =>{
    let getAttrItem = item.getAttribute('data-page');

    if(getAttrItem == 'register' && (url[url.length -2] == 'register' || url[url.length -2] == 'login')){
        item.style.background = "#8E644B";
        item.style.color = "#fff";
        item.classList.remove('active')
    }else if(getAttrItem == url[url.length-2])
        item.classList.add('active');
});

const allowBtnCookie = document.querySelector('.acceptButton');

allowBtnCookie.addEventListener('click', (e)=>{
    e.preventDefault();

    const cardCookie = $('.card-cookie-wp');
    cardCookie.fadeOut();
});