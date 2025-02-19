const ItemsnavMenu = document.querySelectorAll(".items-menu-aside li");
const url = location.href.split("/");

ItemsnavMenu.forEach(item =>{
    let getAttrItem = item.getAttribute('data-page');

    if(getAttrItem == url[url.length-2])
        item.classList.add('item-active');
});