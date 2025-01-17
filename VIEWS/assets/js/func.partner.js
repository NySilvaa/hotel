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