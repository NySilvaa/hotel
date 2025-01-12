const tooltipBook = document.getElementById('tooltip-books');

const getDistanceToTop = (windowTop)=> {
    const formBook = document.getElementById('form-book');
    const checksform = document.querySelector('.checks-form')
    
    tooltipBook.innerHTML = `<svg
                            width="35" height="35"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                            class="tooltip-icon">
                            <defs>
                            <linearGradient id="gradient" x2="0" y2="1">
                                <stop offset="0%" stop-color="#96a1e8"></stop>
                                <stop offset="100%" stop-color="#5061be"></stop>
                            </linearGradient>
                            </defs>
                            <path
                            fill="#55331f"
                            d="M12,17.27L18.18,21L16.54,13.97L22,9.24L14.81,8.62L12,2L9.19,8.62L2,9.24L7.45,13.97L5.82,21L12,17.27Z"
                            ></path>
                        </svg>
                <p>Selecione uma data temporária e uma opção de Hospedagem para acessar as opções de hotéis.</p>`;
        
    if(windowTop.toFixed(2) > 210){
        // TOOLTIP DEVE IR PARA BAIXO
        checksform.append(tooltipBook);
        tooltipBook.classList.add('down')
    }else{
        // TOOLTIP DEVE IR PARA CIMA
        checksform.prepend(tooltipBook);

    }
  }
    
    $('#form-book').submit(function(e){
        const dayCheckIn = document.getElementById('day-check-in');
        const dateCheckIn = document.querySelector('[name=date-check-in]');
        let monthAndYearCheckIn = monthCheckIn.innerText.split(" ");
        dateCheckIn.setAttribute('value', `${dayCheckIn.innerText}/${monthAndYearCheckIn[0]}/${monthAndYearCheckIn[1]}`);
      
        // ELEMENTOS DE CHECK-OUT
        const dayCheckOut = document.getElementById('day-check-out');
        const dateCheckOut = document.querySelector('[name=date-check-out]');
        let monthAndYearCheckOut = monthCheckOut.innerText.split(' ');
        dateCheckOut.setAttribute('value', `${dayCheckOut.innerText}/${monthAndYearCheckOut[0]}/${monthAndYearCheckOut[1]}`);
        const optionSection = document.getElementById("select");

        if(optionSection.value == "Escolha uma Opção"){
            e.preventDefault();
            getDistanceToTop(window.scrollY);
            tooltipBook.style.opacity = 1;

            setTimeout(() => {
                tooltipBook.style.opacity = 0;
                tooltipBook.innerHTML = "";
            }, 5000);
        }
        

        $.ajax({
            type: "Post",
            url: "http://localhost/hotel/",
            data: {
                "dateCheckIn": dateCheckIn.getAttribute("value"),
                "dateCheckOut": dateCheckOut.getAttribute("value")
            },

            success: function(data){
                console.log("Deu certo");
            }, 

            error: function(){
                console.log('Algo Falhou');
            }
        })
    })
