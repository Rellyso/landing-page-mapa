//Efeito navbar gradient
$(function() {
    $(window).on("scroll", function() {
      if($(window).scrollTop() > 15) {
        $(".navbar").removeClass("bg-transparent");
        $(".navbar").addClass("bgChanged");
      } else {
        $(".navbar").removeClass("bgChanged");
      }
    });
  });

// Esconder/Revelar logo ao scroll
$(function() {
  $(window).on("scroll", function() {
    if($(window).scrollTop() > 20) {
      $(".navbar-brand").removeClass("navbarLogoHidden")
      $(".navbar-brand").addClass("navbarLogoReveal")
    } else {
      $(".navbar-brand").removeClass("navbarLogoReveal")
      $(".navbar-brand").addClass("navbarLogoHidden")
    }
  });
});

//Smooth function
const menuItems = document.querySelectorAll('.nav-item a[href^="#"]'); 

menuItems.forEach(item => {
    item.addEventListener('click', scroolToIdOnClick)
});

function scroolToIdOnClick(event) {
    event.preventDefault();
    const element = event.target;
    const to = getScroolByHref(event.target) - 90 || getScroolByHref(event.currentTarget) - 90; 

    scrollToPosition(to);
}

function scrollToPosition(to){
    window.scroll({
      top: to, 
      behavior: 'smooth',
    });
}

function getScroolByHref(element){
    const id = element.getAttribute('href'); 
    return document.querySelector(id).offsetTop; 
}

//Efeito smooth voltando
const logo = document.querySelector('#logonavbar'); 

logo.addEventListener('click', scrollToTop);

function scrollToTop(event){
  event.preventDefault();
  const navElement = event.target; 
  const to = 0; 
  
  window.scroll({
    top: to, 
    behavior: 'smooth',
  });
}
//fim efeito smooth voltando



//Slide

$('#infinite_carousel .fa-chevron-right').on('click', () => {
    let $infinite_carousel_row = $('#infinite_carousel .row');
    let $col = $infinite_carousel_row.find('.col-12:first');
    $infinite_carousel_row.append($col[0].outerHTML);
    $col.remove();
});
  
$('#infinite_carousel .fa-chevron-left').on('click', () => {
    let $infinite_carousel_row = $('#infinite_carousel .row');
    let $col = $infinite_carousel_row.find('.col-12:last');
    $infinite_carousel_row.prepend($col[0].outerHTML);
    $col.remove();
});

//countdown
// Set the date we're counting down to
var countDownDate = new Date("Oct 15, 2020 09:00:00").getTime();

// Update the count down every 1 second
// var x = setInterval(function() {

//   // Get today's date and time
//   var now = new Date().getTime();

//   // Find the distance between now and the count down date
//   var distance = countDownDate - now;

//   // Time calculations for days, hours, minutes and seconds
//   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
//   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
//   var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
//   var seconds = Math.floor((distance % (1000 * 60)) / 1000);

//   // Display the result in the element with id="demo"
//   document.getElementById("dias").innerHTML = days; 
//   document.getElementById("horas").innerHTML = hours; 
//   document.getElementById("minutos").innerHTML = minutes; 
//   document.getElementById("segundos").innerHTML = seconds; 
  
  
//   + "d " + hours + "h "
//   + minutes + "m " + seconds + "s ";

//   // If the count down is finished, write some text
//   if (distance < 0) {
//     clearInterval(x);
//     document.getElementById("counter").innerHTML = "O curso começou, faça sua inscrição imediatamente clicando no botão ao lado";
//   }
// }, 1000);


//Slide teste 

$('#recipeCarousel').carousel({
  interval: 10000
})

$('#slideteste .carousel-item').each(function(){
    var minPerSlide = 4;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
    
    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}
        
        next.children(':first-child').clone().appendTo($(this));
      }
});


// ANIMAÇÃO AO ROLAR A PÁGINA
const elements = document.querySelectorAll('[data-anim]')
const animationClassName = 'animation'

function animateOnScroll() {
  // guarda o valor de 3/4 do tamanho da janela 
  const pageTopOnWindow = window.pageYOffset + ((window.innerHeight)*0.8) - 120

  elements.forEach(element => {
    if (pageTopOnWindow > element.offsetTop) {
        element.classList.add(animationClassName)
    } else {
      element.classList.remove(animationClassName)
    }
  })
}

if (elements.length) {
  window.addEventListener('scroll', animateOnScroll)
}