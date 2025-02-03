const txtBanner = document.getElementById('txt-banner');
const descriptionBanner = document.getElementById('description-banner');
const numberSlideBanner = document.getElementById('count-page-banner');
const btnSlideBanner = document.getElementById('btn-slide-banner');
const bgEntrance = document.querySelector('.bg-entrance');
let countPage = 1;

const changeSlideBanner = ()=>{
    if(countPage >= 5)
        countPage = 1;
    
    let counPageStr = String(countPage);

    switch (counPageStr) {
        case '1':
            txtBanner.innerHTML = "Explore the World <br> With Us";
            bgEntrance.style.background = "url('../images/bg-about-entrance.jpg')";
            descriptionBanner.innerHTML = "Explore Our Curated List of Must-visit Destinations Around the Globe";
        break;

        case '2':
            txtBanner.innerHTML = "Beautiful Places and <br> Unforgettable";
            bgEntrance.style.background = "url('../images/bg-entrance2.jpg')";
            descriptionBanner.innerHTML = "Places Enjoyable and an Experience that You'd never Lived";
        break;

        case '3':
            txtBanner.innerHTML = "Prices that Cover in <br> Your Pocket";
            bgEntrance.style.background = "url('../images/bg-entrance3.jpg')";
            descriptionBanner.innerHTML = "Differents Ways of Host to Can Please Your Likes";
        break;

        case '4':
            txtBanner.innerHTML = "We're Going to Propuse to You Incredibles Photos";
            bgEntrance.style.background = "url('../images/bg-entrance4.jpg')";
            descriptionBanner.innerHTML = "Create Amazing Memories to Share Your Friends";
        break;
    
        default:
            break;
    }
    
    numberSlideBanner.innerHTML = countPage;
    countPage++;
}

changeSlideBanner()

btnSlideBanner.addEventListener('click', (e)=>{
    e.preventDefault();
    changeSlideBanner();
});