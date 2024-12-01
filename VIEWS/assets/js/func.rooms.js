let control = true;

const favoriteBook = ()=>{
    const btnFavorite = document.querySelectorAll('.favorite');

    btnFavorite.forEach(item=>{
        item.addEventListener('click', (e)=>{
            e.preventDefault();
           let icon = item.firstElementChild

          if(control){
            icon.classList.remove('bx-heart');
            icon.classList.add('bxs-heart');
            control = false;
          }else{
            icon.classList.add('bx-heart');
            icon.classList.remove('bxs-heart');
            control = true;
          }
        })
    })
}

favoriteBook()

const showModal = ()=>{
    const dataBox = document.querySelectorAll('.data-book-box');
    const fieldCountry = document.getElementById('destiny-country');

    dataBox.forEach(item=>{
        let input = item.childNodes[3]

        input.addEventListener('click', ()=>{
            const modal = input.parentNode.lastElementChild

            if(control){
                modal.classList.add('show');
                fieldCountry.focus()
                chooseCountry()
                control = false;
            }else{
                modal.classList.remove('show');
                control = true;
            }
        })
    })
}

showModal()

const showOptions = (arr, value)=>{
    const searchField = document.getElementById(value)
    const listEl = document.getElementById('list-country')
    searchField.addEventListener('input', inputHandler)

    fillList()

    function fillList (list = arr){
        listEl.innerHTML = ""

        for (let i = 0; i < list.length; i++) {
            let listItems = document.createElement('li')
            listItems.innerHTML = list[i]
            listEl.appendChild(listItems)
        }
    }

    function inputHandler(){
        const filteredList = arr.filter(el =>{
            const listItem = el.toLowerCase()
            const searchWord = searchField.value.toLowerCase();

            return listItem.includes(searchWord)
        })

            fillList(filteredList)
    }
};

let listOption = ""

const chooseCountry = ()=>{
    const countries = ["Brasil", "Estados Unidos", "Canadá", "Argentina", "China", "Japão", "Alemanha", "França", "Itália", "Espanha", "Reino Unido", "Rússia", "Índia", "Austrália", "África do Sul", "México"];
    const fieldCountry = document.getElementById('destiny-country');
    const fieldCity = document.getElementById('destiny-city');

    if(fieldCountry.getAttribute('class').split(" ")[2] !== 'selected')
        showOptions(countries, 'destiny-country'); // User ainda está escolhendo as opções de países

        listOption = document.querySelectorAll('ul#list-country li')

        listOption.forEach(element=>{
            element.addEventListener('click', ()=>{
                let countryChoosed = element.innerText;
                fieldCountry.value = countryChoosed;
                element.parentNode.innerText = '';
                fieldCity.focus();
                showCity(countryChoosed);
                fieldCountry.classList.add('selected');
            });
        });

        fieldCountry.addEventListener('change', ()=>{
            listOption = document.querySelectorAll('ul#list-country li')

            listOption.forEach(element=>{
                element.addEventListener('click', ()=>{
                    let countryChoosed = element.innerText;
                    fieldCountry.value = countryChoosed;
                    element.parentNode.innerText = '';
                    fieldCity.focus();
                    showCity(countryChoosed);
                    fieldCountry.classList.add('selected');
                });
            });
        })
}

const showCity = (country)=>{
    const citiesByCountry = {
        "Brasil": ["São Paulo", "Rio de Janeiro", "Brasília", "Salvador"],
        "Estados Unidos": ["Nova York", "Los Angeles", "Chicago", "Houston"],
        "Canadá": ["Toronto", "Montreal", "Vancouver", "Calgary"],
        "Argentina": ["Buenos Aires", "Córdoba", "Rosario", "Mendoza"],
        "China": ["Pequim", "Xangai", "Cantão", "Shenzhen"],
        "Japão": ["Tóquio", "Osaka", "Kyoto", "Yokohama"],
        "Alemanha": ["Berlim", "Munique", "Hamburgo", "Colônia"],
        "França": ["Paris", "Marselha", "Lyon", "Nice"],
        "Itália": ["Roma", "Milão", "Veneza", "Florença"],
        "Espanha": ["Madrid", "Barcelona", "Valência", "Sevilha"],
        "Reino Unido": ["Londres", "Manchester", "Birmingham", "Glasgow"],
        "Rússia": ["Moscou", "São Petersburgo", "Novosibirsk", "Cazã"],
        "Índia": ["Nova Delhi", "Mumbai", "Calcutá", "Bangalore"],
        "Austrália": ["Sydney", "Melbourne", "Brisbane", "Perth"],
        "África do Sul": ["Cidade do Cabo", "Johannesburgo", "Durban", "Pretória"],
        "México": ["Cidade do México", "Guadalajara", "Monterrey", "Puebla"]
    };

    showOptions(citiesByCountry[country], 'destiny-city')
    chooseCity()
}

const chooseCity = ()=>{
    const locationField = document.getElementById('location');
    const destinyCity = document.getElementById('destiny-city');

    destinyCity.addEventListener('keyup', ()=>{
        locationField.setAttribute('value', destinyCity.value);
    });

        listOption = document.querySelectorAll('ul#list-country li')
    
        listOption.forEach(element=>{
            element.addEventListener('click', ()=>{
                destinyCity.value = element.innerText;
                locationField.setAttribute('value', element.innerText);
                element.parentNode.innerText = '';
            })
        })

        destinyCity.addEventListener('change', ()=>{
            listOption = document.querySelectorAll('ul#list-country li')
    
            listOption.forEach(element=>{
                element.addEventListener('click', ()=>{
                    destinyCity.value = element.innerText;
                    locationField.setAttribute('value', element.innerText);
                    element.parentNode.innerText = '';
                })
            })
        })
}