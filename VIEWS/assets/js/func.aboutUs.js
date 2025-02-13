const txtBanner = document.getElementById('txt-banner');
const descriptionBanner = document.getElementById('description-banner');
const numberSlideBanner = document.getElementById('count-page-banner');
const btnSlideBanner = document.getElementById('btn-slide-banner');
const bgEntrance = document.querySelector('.bg-entrance');
let countPage = 1;

const changeSlideBanner = ()=>{
    if(countPage >= 5)
        countPage = 1;
    
    let countPageStr = String(countPage);

    switch (countPageStr) {
        case '1':
            txtBanner.innerHTML = "Explore the World <br> With Us";
            bgEntrance.style.backgroundImage = "url('http://localhost/hotel/Views/assets/images/bg-about-entrance.jpg')";
            bgEntrance.style.backgroundSize = "100% 100%"
            descriptionBanner.innerHTML = "Explore Our Curated List of Must-visit Destinations Around the Globe";
        break;

        case '2':
            txtBanner.innerHTML = "Beautiful Places and <br> Unforgettable";
            bgEntrance.style.background = "url('http://localhost/hotel/Views/assets/images/bg-entrance2.jpg')";
            bgEntrance.style.backgroundSize = "100% 100%"
            descriptionBanner.innerHTML = "Places Enjoyable and an Experience that You'd never Lived";
        break;

        case '3':
            txtBanner.innerHTML = "Prices that Cover in <br> Your Pocket";
            bgEntrance.style.background = "url('http://localhost/hotel/Views/assets/images/bg-entrance3.jpg')";
            bgEntrance.style.backgroundSize = "100% 100%"
            descriptionBanner.innerHTML = "Differents Ways of Host to Can Please Your Likes";
            txtBanner.style.color = "#EFEFEF"
        break;

        case '4':
            txtBanner.innerHTML = "We're Going to Propuse to You Incredibles Photos";
            bgEntrance.style.background = "url('http://localhost/hotel/Views/assets/images/bg-entrance4.jpg')";
            bgEntrance.style.backgroundSize = "100% 100%"
            descriptionBanner.innerHTML = "Create Amazing Memories to Share Your Friends";
            txtBanner.style.color = "#55331f"
        break;
    
        default:
            break;
    }
    
    numberSlideBanner.innerHTML = countPage;
    countPage++;
};

let x = setInterval(() => {
    changeSlideBanner();
}, 3000);

btnSlideBanner.addEventListener('click', (e)=>{
    e.preventDefault();
    clearInterval(x);
    changeSlideBanner();
});

const changeImgDescriptionHighlight = ()=>{
    const imgs = document.querySelectorAll(".img-descriptions-highlights figure img");
    const imgMain = document.querySelector(".img-highlight");
    const btnPassImg = document.querySelector('.pass-category');
    let controlImg = 0;

    btnPassImg.addEventListener('click', (e)=>{
        e.preventDefault();
       controlImg++;

        if(controlImg > imgs.length -1)
            controlImg = 0;

        let srcImg = imgs[0].getAttribute('src');

        imgMain.style.backgroundImage = `url(${srcImg})`;
        imgMain.style.backgroundSize = "cover"

       if(controlImg == 1){
            imgs[0].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about2.jpg`);
            imgs[1].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about3.jpg`);
            imgs[2].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about4.jpg`);
            imgs[3].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about-main.jpg`);
       }else if(controlImg == 2){
            imgs[0].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about3.jpg`);
            imgs[1].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about4.jpg`);
            imgs[2].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about-main.jpg`);
            imgs[3].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about1.jpg`);
       }else if(controlImg == 3){
           imgs[0].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about4.jpg`);
            imgs[1].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about-main.jpg`);
            imgs[2].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about1.jpg`);
            imgs[3].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about2.jpg`);
       }else if(controlImg == 0){
            imgs[0].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about-main.jpg`);
            imgs[1].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about1.jpg`);
            imgs[2].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about2.jpg`);
            imgs[3].setAttribute("src",`http://localhost/hotel/Views/assets/images/bg-about3.jpg`);
       }
    });
}

changeImgDescriptionHighlight();