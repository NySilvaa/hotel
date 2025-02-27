$(function(){
    Fancybox.bind("[data-fancybox]");
    $("#check-in-info-book").mask("99/99/9999");
    $("#check-out-info-book").mask("99/99/9999");
    $("#person-info-book").mask("0000000", {reverse: true});
    $("#nights-info-book").mask("0000000", {reverse: true});
});

const btnEfetuarReserva = document.getElementById("efetuar-reserva");
const nextStepBook = document.querySelector(".next-step-book");
const infoBooks = document.querySelector('.info-books');

btnEfetuarReserva.addEventListener('click', ()=>{
    infoBooks.style.height = "430px";
    infoBooks.style.opacity = 1;
});

const disabledBtnNextStepBook = ()=>{
    // SEÇÃO DE PREENCHIMENTO DOS DADOS DE RESERVA
    const checkInInfoBooks = document.getElementById("check-in-info-book");
    const checkOutInfoBooks = document.getElementById("check-out-info-book");
    const personInfoBooks = document.getElementById("person-info-book");
    const nightsInfoBooks = document.getElementById("nights-info-book");

    if(checkInInfoBooks.value == "" || checkOutInfoBooks.value == "" || personInfoBooks.value == "" || nightsInfoBooks.value == "")
        nextStepBook.disabled = true;
    else
        nextStepBook.disabled = false;
}
disabledBtnNextStepBook();

const efetuarReserva = ()=>{
    // SEÇÃO DE PREENCHIMENTO DOS DADOS DE RESERVA
    const checkInInfoBooks = document.getElementById("check-in-info-book");
    const checkOutInfoBooks = document.getElementById("check-out-info-book");
    const personInfoBooks = document.getElementById("person-info-book");
    const nightsInfoBooks = document.getElementById("nights-info-book");

    // SEÇÃO DE REALIZAÇÃO DA RESERVA
    const hospedes = document.querySelector(".host p");
    const prizePerNight = document.querySelector(".prizePerNights");
    const prizeHalf = document.querySelector(".prizeHalf")
    const prizeFinal = document.querySelector(".prizeFinal span");

    // REPARTIÇÕES DAS SEÇÕES DE REALIZAÇÕES DA RESERVA
    const prizeOriginal = document.querySelector(".prizeHalf").innerText.split(" ")[1];
    const prizeDigited = prizeHalf.innerText.split(" ")[1];
    const prizeFormated = prizeDigited.split(",")[0];
    const countHospedes = hospedes.innerText.split(" ");

    // PEGAR A DATA ATUAL
    const date = new Date();
    
    function validateDate(dataInserida){
        const dataLimite = new Date();
        const month = date.getMonth() +1;
        dataLimite.setMonth(month+ 6);

        const data = new Date(dataInserida);

        if (data < date) {
            alert("A data não pode ser retroativa.");
            return false;
        }

        if (data > dataLimite) {
            alert("A data não pode ser maior do que 6 meses a partir de hoje.");
            return false;
        }

        return true;
    }

    checkInInfoBooks.addEventListener("input", (e)=>{
        const checkInBook = document.querySelector(".date-check-in-user");

        if(checkInInfoBooks.value.length == 10){
            if(!validateDate(checkInInfoBooks.value))
                checkInInfoBooks.style.color = "#f00"
            else
                checkInInfoBooks.style.color = "#0f0"
        }

        checkInBook.innerText = checkInInfoBooks.value;
    });
    
    checkOutInfoBooks.addEventListener("input", ()=>{
        const checkOutBook = document.querySelector(".date-check-out-user");
       
        if(checkOutInfoBooks.value.length == 10){
            if(!validateDate(checkOutInfoBooks.value))
                checkOutInfoBooks.style.color = "#f00"
            else
                checkOutInfoBooks.style.color = "#0f0"
        }
            
        checkOutBook.innerText = checkOutInfoBooks.value;
    });
    
    personInfoBooks.addEventListener("input", ()=>{
        let countPerson = Number(personInfoBooks.value);
    
        if(countPerson == NaN)
            alert("Você está tentando inserir um valor não-numérico, tente digitar um número.");
        else
            hospedes.innerText = (countPerson == "" || countPerson == 0 || countPerson == " ") ? "1 Hóspede" : `${countPerson} ${countHospedes[1]}s`;
    });
    
    nightsInfoBooks.addEventListener("input", ()=>{
        let nights = Number(nightsInfoBooks.value);
    
        if(nights == NaN){
            alert("Você está tentando inserir um valor não-numérico, tente digitar um número.");
        }else{
            if(nights == "" || nights == 0 || nights == " "){
                prizePerNight.innerHTML = `<b>R$ ${prizeOriginal} </b> por 1 noite`;
            }else{
                prizePerNight.innerHTML = `<b>R$ ${prizeOriginal} </b> por ${nights} noite`;
            
                prizeHalf.innerText = `R$ ${nights * Number(prizeFormated)},00`;
                prizeFinal.innerText = `R$ ${(nights * Number(prizeFormated)) + 20},00`;
                disabledBtnNextStepBook();
            }
        }
    });
}
efetuarReserva();

const finalizarReserva = ()=>{
    const cardConfirmation = document.querySelector(".card-confirmation-wp");
    cardConfirmation.style.display = "flex";

    //  DADOS DA SEÇÃO DE REALIZAÇÃO
    const prizeFinal = document.querySelector(".prizeFinal span").innerText || "";
    const hospedes = document.querySelector(".host p").innerText || "";
    const checkInBook = document.querySelector(".date-check-in-user").innerText || "";
    const checkOutBook = document.querySelector(".date-check-out-user").innerText || "";
    const nightsInfoBooks = document.getElementById("nights-info-book").value || "";

    // DADOS DO CARD DE CONFIRMAÇÃO
    const checkInConfirmation = document.querySelector(".check-in-confirmation");
    const checkOutConfirmation = document.querySelector(".check-out-confirmation");
    const nightsConfirmation = document.querySelector(".nights-confirmation");
    const personConfirmation = document.querySelector(".person-confirmation");
    const prizeConfirmation = document.querySelector(".prize-confirmation");

    // INPUTS PARA CONFIRMAÇÃO DOS DADOS
    const checkInConfirmationValue = document.getElementById("check-in-confirmation-value");
    const checkOutConfirmationValue = document.getElementById("check-out-confirmation-value");
    const personConfirmationValue = document.getElementById("person-confirmation-value");
    const nightsConfirmationValue = document.getElementById("nights-confirmation-value");
    const prizeFinalConfirmationValue = document.getElementById("prize-final-confirmation-value");

    checkInConfirmation.innerText = checkInBook;
    checkOutConfirmation.innerText = checkOutBook
    personConfirmation.innerText = hospedes;
    nightsConfirmation.innerText = nightsInfoBooks;
    prizeConfirmation.innerText = prizeFinal;

    checkInConfirmationValue.value = checkInBook;
    checkOutConfirmationValue.value = checkOutBook;
    personConfirmationValue.value = hospedes.split(" ")[0];
    nightsConfirmationValue.value = nightsInfoBooks;
    prizeFinalConfirmationValue.value = prizeFinal;
}

nextStepBook.addEventListener("click", (e)=>{
    e.preventDefault()
    finalizarReserva();
});

const btnCloseCardConfirmation = document.querySelector(".close-card-confirmation");
btnCloseCardConfirmation.addEventListener("click", ()=>{
    const cardConfirmation = document.querySelector(".card-confirmation-wp");
    cardConfirmation.style.display = "none";
});
