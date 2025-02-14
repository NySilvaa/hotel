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
const declineBtnCookie = document.querySelector('.declineButton');

const setCookieAjax = (cookieValue) =>{
    let pathUrl = location.href;

    $.ajax({
        type: "POST",
        url: pathUrl,
        data: {"cookie": cookieValue}, 
        success: function(response){
            let secao = $(response)[38];

            if(secao.getAttribute('class') == 'card-cookie-wp')
                $('.card-cookie-wp').html(secao);
            else
                alert("Ocorreu um erro ao selecionar a opção de cookie, pedimos que desconsidere temporariamente.");
        }
    })
};

allowBtnCookie.addEventListener('click', (e)=>{
    e.preventDefault();
    setCookieAjax("selected");
});

declineBtnCookie.addEventListener('click', (e)=>{
    e.preventDefault();
    setCookieAjax("decline");
});