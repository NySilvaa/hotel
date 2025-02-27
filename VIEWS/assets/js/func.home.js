const showButtonBookAccomodation = ()=>{
    const btnBookAccomodation = document.getElementById('book-accomodation');
    
    document.addEventListener('scroll', ()=>{
        if(window.scrollY.toFixed(2) > 140){
            // O user está descendo a página, devemos mostrar o botão book accomodation
            btnBookAccomodation.style.display = 'inline-block';
        }else{
            // O user está no começo do site, o botão ficará oculto
            btnBookAccomodation.style.display = 'none';
        }
    })
};
showButtonBookAccomodation();

// FUNÇÃO DE CONTAGEM DE PESSOAS POR QUARTO
const chooseRoomsPerGuests = ()=>{
    const add = document.getElementById('add');
    const sub = document.getElementById('sub');
    const count = document.getElementById('count');

    let valueCount = count.value
    let newValueCount = Number(valueCount);

    add.addEventListener('click', ()=>{
        if(newValueCount < 5)
            count.value = ++newValueCount;
    })

    sub.addEventListener('click', ()=>{
        if(newValueCount > 1)
            count.value = --newValueCount;
    })

    if(valueCount == '')
        count.value = 1
};
chooseRoomsPerGuests();

// FUNÇÕES PARA O CALENDÁRIO DE RESERVAS
!function() {
  var today = moment();

  function Calendar(selector, events) {
    this.el = document.querySelector(selector);
    this.events = events;
    this.current = moment().date(1);
    this.draw();
    var current = document.querySelector('.today');
    if(current) {
      var self = this;
    }
  }

  Calendar.prototype.draw = function() {
    //Create Header
    this.drawHeader();

    //Draw Month
    this.drawMonth();

    this.drawLegend();
  }

  Calendar.prototype.drawHeader = function() {
    var self = this;
    if(!this.header) {
      //Create the header elements
      this.header = createElement('div', 'header');
      this.header.className = 'header';

      this.title = createElement('h1');

      var right = createElement('div', 'right');
      right.addEventListener('click', function() { self.nextMonth(); });

      var left = createElement('div', 'left');
      left.addEventListener('click', function() { self.prevMonth(); });

      //Append the Elements
      this.header.appendChild(this.title); 
      this.header.appendChild(right);
      this.header.appendChild(left);
      this.el.appendChild(this.header);
    }

    this.title.innerHTML = this.current.format('MMMM YYYY');
  }

  Calendar.prototype.drawMonth = function() {
    var self = this;
    
    this.events.forEach(function(ev) {
     ev.date = self.current.clone().date(Math.random() * (29 - 1) + 1);
    });
    
    
    if(this.month) {
      this.oldMonth = this.month;
      this.oldMonth.className = 'month out ' + (self.next ? 'next' : 'prev');
      this.oldMonth.addEventListener('webkitAnimationEnd', function() {
        self.oldMonth.parentNode.removeChild(self.oldMonth);
        self.month = createElement('div', 'month');
        self.backFill();
        self.currentMonth();
        self.fowardFill();
        self.el.appendChild(self.month);
        window.setTimeout(function() {
          self.month.className = 'month in ' + (self.next ? 'next' : 'prev');
        }, 16);
      });
    } else {
        this.month = createElement('div', 'month');
        this.el.appendChild(this.month);
        this.backFill();
        this.currentMonth();
        this.fowardFill();
        this.month.className = 'month new';
    }
  }

  Calendar.prototype.backFill = function() {
    var clone = this.current.clone();
    var dayOfWeek = clone.day();

    if(!dayOfWeek) { return; }

    clone.subtract('days', dayOfWeek+1);

    for(var i = dayOfWeek; i > 0 ; i--) {
      this.drawDay(clone.add('days', 1));
    }
  }

  Calendar.prototype.fowardFill = function() {
    var clone = this.current.clone().add('months', 1).subtract('days', 1);
    var dayOfWeek = clone.day();

    if(dayOfWeek === 6) { return; }

    for(var i = dayOfWeek; i < 6 ; i++) {
      this.drawDay(clone.add('days', 1));
    }
  }

  Calendar.prototype.currentMonth = function() {
    var clone = this.current.clone();

    while(clone.month() === this.current.month()) {
      this.drawDay(clone);
      clone.add('days', 1);
    }
  }

  Calendar.prototype.getWeek = function(day) {
    if(!this.week || day.day() === 0) {
      this.week = createElement('div', 'week');
      this.month.appendChild(this.week);
    }
  }

  Calendar.prototype.drawDay = function(day) {
    var self = this;
    this.getWeek(day);

    //Outer Day
    var outer = createElement('div', this.getDayClass(day));

    //Day Name
    var name = createElement('div', 'day-name', day.format('ddd'));

    //Day Number
    var number = createElement('div', 'day-number', day.format('DD'));


    //Events
    var events = createElement('div', 'day-events');
    this.drawEvents(day, events);

    outer.appendChild(name);
    outer.appendChild(number);
    outer.appendChild(events);
    this.week.appendChild(outer);
  }

  Calendar.prototype.drawEvents = function(day, element) {
    if(day.month() === this.current.month()) {
      var todaysEvents = this.events.reduce(function(memo, ev) {
        if(ev.date.isSame(day, 'day')) {
          memo.push(ev);
        }
        return memo;
      }, []);

      todaysEvents.forEach(function(ev) {
        var evSpan = createElement('span', ev.color);
        element.appendChild(evSpan);
      });
    }
  }

  Calendar.prototype.getDayClass = function(day) {
    classes = ['day'];
    if(day.month() !== this.current.month()) {
      classes.push('other');
    } else if (today.isSame(day, 'day')) {
      classes.push('today');
    }
    return classes.join(' ');
  }

  Calendar.prototype.renderEvents = function(events, ele) {
    //Remove any events in the current details element
    var currentWrapper = ele.querySelector('.events');
    var wrapper = createElement('div', 'events in' + (currentWrapper ? ' new' : ''));

    events.forEach(function(ev) {
      var div = createElement('div', 'event');
      var square = createElement('div', 'event-category ' + ev.color);
      var span = createElement('span', '', ev.eventName);

      div.appendChild(square);
      div.appendChild(span);
      wrapper.appendChild(div);
    });

    if(!events.length) {
      var div = createElement('div', 'event empty');
      var span = createElement('span', '', 'No Events');

      div.appendChild(span);
      wrapper.appendChild(div);
    }

    if(currentWrapper) {
      currentWrapper.className = 'events out';
      currentWrapper.addEventListener('webkitAnimationEnd', function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });
      currentWrapper.addEventListener('oanimationend', function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });
      currentWrapper.addEventListener('msAnimationEnd', function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });
      currentWrapper.addEventListener('animationend', function() {
        currentWrapper.parentNode.removeChild(currentWrapper);
        ele.appendChild(wrapper);
      });
    } else {
      ele.appendChild(wrapper);
    }
  }

  Calendar.prototype.drawLegend = function() {
    var legend = createElement('div', 'legend');
    this.events.map(function(e) {
      return e.calendar + '|' + e.color;
    }).reduce(function(memo, e) {
      if(memo.indexOf(e) === -1) {
        memo.push(e);
      }
      return memo;
    }, []).forEach(function(e) {
      var parts = e.split('|');
      var entry = createElement('span', 'entry ' +  parts[1], parts[0]);
      legend.appendChild(entry);
    });
    this.el.appendChild(legend);
  }

  Calendar.prototype.nextMonth = function() {
    this.current.add('months', 1);
    this.next = true;
    this.draw();
  }

  Calendar.prototype.prevMonth = function() {
    this.current.subtract('months', 1);
    this.next = false;
    this.draw();
  }

  window.Calendar = Calendar;

  function createElement(tagName, className, innerText) {
    var ele = document.createElement(tagName);
    if(className) {
      ele.className = className;
    }
    if(innerText) {
      ele.innderText = ele.textContent = innerText;
    }
    return ele;
  }
}();

!function() {
  var data = [
    { eventName: 'Lunch Meeting w/ Mark', calendar: 'Work', color: 'orange' },
    { eventName: 'Interview - Jr. Web Developer', calendar: 'Work', color: 'orange' },
    { eventName: 'Demo New App to the Board', calendar: 'Work', color: 'orange' },
    { eventName: 'Dinner w/ Marketing', calendar: 'Work', color: 'orange' },

    { eventName: 'Game vs Portalnd', calendar: 'Sports', color: 'blue' },
    { eventName: 'Game vs Houston', calendar: 'Sports', color: 'blue' },
    { eventName: 'Game vs Denver', calendar: 'Sports', color: 'blue' },
    { eventName: 'Game vs San Degio', calendar: 'Sports', color: 'blue' },

    { eventName: 'School Play', calendar: 'Kids', color: 'yellow' },
    { eventName: 'Parent/Teacher Conference', calendar: 'Kids', color: 'yellow' },
    { eventName: 'Pick up from Soccer Practice', calendar: 'Kids', color: 'yellow' },
    { eventName: 'Ice Cream Night', calendar: 'Kids', color: 'yellow' },

    { eventName: 'Free Tamale Night', calendar: 'Other', color: 'green' },
    { eventName: 'Bowling Team', calendar: 'Other', color: 'green' },
    { eventName: 'Teach Kids to Code', calendar: 'Other', color: 'green' },
    { eventName: 'Startup Weekend', calendar: 'Other', color: 'green' }
  ];

  
  new Calendar('#calendar', data);
}();  

const calendar = document.getElementById('calendar'); // CALENDÁRIO
const rightArrow = document.querySelector('.right'); // SETA MONTH NEXT
const leftArrow = document.querySelector('.left'); // SETA MONTH PREV

// ELEMENTOS DE CHECK-IN
const  monthCheckIn = document.getElementById('month-check-in');
const  dayCheckIn = document.getElementById('day-check-in');
const checkInSection = document.querySelector('.check-in');

// ELEMENTOS DE CHECK-OUT
const  monthCheckOut = document.getElementById('month-check-out');
const  dayCheckOut = document.getElementById('day-check-out');
const checkOutSection = document.querySelector('.check-out');
let getDay = ''
let monthTitleCalendar = ''

const months = [
  'January',
   'February',
   'March',
   'April',
   'May',
   'June',
   'July',
   'August',
   'September',
   'October',
   'November',
   'December'
];

// SETAR A DATA ATUAL NO CHECK-IN E A PRÓXIMA DATA NO CHECK-OUT
const date = new Date();
dayCheckIn.innerText = date.getDate();
dayCheckOut.innerText = date.getDate();

monthCheckIn.innerText = (date.getMonth() + 1 > 12) ? ` ${months[0]} ${Number(date.getFullYear() + 1)}` : ` ${months[date.getMonth()]} ${date.getFullYear()}`; // MÊS ATUAL
monthCheckOut.innerText = (date.getMonth() + 2 > 12) ? ` ${months[0]} ${Number(date.getFullYear() + 1)}` : ` ${months[date.getMonth()+1]} ${Number(date.getFullYear())}`;;  // MÊS SEGUINTE

// FUNÇÃO PARA MOSTRAR O CALENDÁRIO PARA SELECIONAR AS DATAS DE CHECKS
const showCalendar = ()=>{
    const dateSection = document.querySelectorAll('.date');
    
    dateSection.forEach(element=>{
      element.addEventListener('click', ()=>{
        let dateSectionCheck = element.parentNode.getAttribute('class').split(' ');
        
        // FUNÇÃO PARA CASO O USUÁRIO RESOLVA MUDAR A DATA DE CHECK-IN OU CHECK-OUT
        if(dateSectionCheck[1] == 'selected')
          element.parentNode.classList.remove('selected');
        
        calendar.classList.add('active');
        })
    })
}
showCalendar();

// FUNÇÃO PARA PEGAR O MÊS E TROCAR DENTRO DOS CAMPOS DE CHECKS
const getMonth = (month)=>{
  let checkInSectionClass = checkInSection.getAttribute('class').split(' ')[1] ;
  
  if(checkInSectionClass !== 'selected')
    monthCheckIn.innerText = month
  else
    monthCheckOut.innerText = month
};

// FUNÇÃO PARA ESCOLHER O DIA
const changeDay = ()=>{
  getDay = document.querySelectorAll('.day-number');
  const fieldCheckIn = document.querySelector('[name=date-check-in]');
  const fieldCheckOut = document.querySelector('[name=date-check-out]');

      getDay.forEach(item=>{
        item.addEventListener('click', ()=>{
          let checkInSectionClass = checkInSection.getAttribute('class').split(' ')[1] ;

          if(checkInSectionClass !== 'selected'){
            dayCheckIn.innerText = item.innerText
            fieldCheckIn.setAttribute('value', item.innerText);
            checkInSection.classList.add('selected')
            calendar.classList.remove('active') 

            if(item.parentNode.getAttribute('class').split(' ')[1] === 'other')
              daysOther(Number(item.innerText), monthCheckIn);
          }else{
            dayCheckOut.innerText = item.innerText
            checkOutSection.classList.add('selected')
            calendar.classList.remove('active')
           
            if(item.parentNode.getAttribute('class').split(' ')[1] === 'other')
              daysOther(Number(item.innerText), monthCheckOut);
          }
        })
  })
};
changeDay();

// FUNÇÃO NEXT MONTH
rightArrow.addEventListener('click', ()=>{
    monthTitleCalendar = document.querySelector('.header h1').innerText
    getMonth(monthTitleCalendar)
    createAttrHeaderMonth(monthTitleCalendar)

    setTimeout(()=>{
      changeDay()
    }, 600);
});

// FUNÇÃO PREVIOUS MONTH
leftArrow.addEventListener('click', ()=>{
  monthTitleCalendar = document.querySelector('.header h1').innerText
  getMonth(monthTitleCalendar);

  setTimeout(()=>{
    changeDay();
    createAttrHeaderMonth(monthTitleCalendar);
  }, 600)
});

// CRIAR ATRIBUTO DO MÊS PARA MONITORAR E INTERAÇÃO DE OUTRAS FUNÇÕES
function createAttrHeaderMonth(month){
  const headerMonth = document.querySelector('#calendar .header h1');
  let currentMonthAttr = month.split(' ')[0]

  for (let i = 0; i < months.length; i++) {
    if(months[i] === currentMonthAttr)
      headerMonth.setAttribute('data-month', i+1);
  }
}

// FUNÇÃO PARA CASO O USUÁRIO ESCOLHA UMA DATA QUE NÃO SEJA NAQUELE MÊS ATUAL EM QUE ESTEJA SENDO MOSTRADO PARA ELE
const daysOther= (day, checkSection)=>{
  const monthsObj = {
    1: 'January',
    2: 'February',
    3:  'March',
    4:  'April',
    5:  'May',
    6:  'June',
    7:  'July',
    8: 'August',
    9:  'September',
    10: 'October',
    11:  'November',
    12:  'December'
  };

  const headerMonth = document.querySelector('#calendar .header h1');
  let headerTittle = headerMonth.getAttribute('data-month');
  let headerYearTittle = headerMonth.innerText.split(' ')[1]

  if((day >= 24 && day <= 30) || (day >= 25 && day <= 31)){
    // MÊS ANTERIOR
    checkSection.innerText = monthsObj[Number(headerTittle -1)] + " " + headerYearTittle;
  }else if(day >= 1 && day <= 7){
    // PRÓXIMO MÊS
      checkSection.innerText = monthsObj[1] + " " + (Number(headerYearTittle) +1);
  }
}

// FUNÇÃO DE SLIDE DA PÁGINA HOME
const boxDiferenciais = document.querySelectorAll('.box-diferenciais')
const btnRightOurRooms = document.querySelector('.btn-right-our-rooms');
const btnLeftOurRooms = document.querySelector('.btn-left-our-rooms');
let controlerSlide = 0;

const moveSlide = (n)=>{
  controlerSlide += n;

  if(controlerSlide > 0)
    btnLeftOurRooms.style.display = 'inline-block'
  
  if(controlerSlide < 0)
    controlerSlide = boxDiferenciais.length - 1;
  
  if(controlerSlide > 4){
    controlerSlide = 0;
    btnLeftOurRooms.style.display = 'none';
  }

  updateSlide();
}

const updateSlide = ()=>{
  const ourRoomsWp = document.querySelector('.diferenciais-wrapper');
  const slideWidth = boxDiferenciais[controlerSlide].clientWidth;

  ourRoomsWp.style.transform = `translateX(${-slideWidth * controlerSlide}px)`;
}

btnRightOurRooms.addEventListener('click', ()=>{
  moveSlide(1);
});

btnLeftOurRooms.addEventListener('click', ()=>{
  moveSlide(-1);
});