
// Owlcarousel
$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop:true,
      margin:10,
      nav:true,
      autoplay:true,
      autoplayTimeout:3000,
      autoplayHoverPause:true,
      center: true,
      navText: [
          "<i class='fa fa-angle-left'></i>",
          "<i class='fa fa-angle-right'></i>"
      ],
      responsive:{
          0:{
              items:1
          },
          600:{
              items:1
          },
          1000:{
              items:3
          }
      }
    });
  });



let projet1= document.querySelector('.ar1');

let projet2= document.querySelector('.ar2');
let projet3= document.querySelector('.ar3');

let projet4= document.querySelector('.ar4');
let projet5= document.querySelector('.ar5');



document.querySelector('#plomb').onclick = () =>{
    projet2.classList.add('active');
    
    projet1.classList.remove('active');
    projet3.classList.remove('active');
    projet4.classList.remove('active');
    projet5.classList.remove('active');
    
};

document.querySelector('#cons').onclick = () =>{
    projet1.classList.add('active');
    projet2.classList.remove('active');
    projet3.classList.remove('active');
    projet4.classList.remove('active');
    projet5.classList.remove('active');
};

document.querySelector('#elec').onclick = () =>{
    projet3.classList.add('active');
    projet2.classList.remove('active');
    projet1.classList.remove('active');
    projet4.classList.remove('active');
    projet5.classList.remove('active');
};

document.querySelector('#reab').onclick = () =>{
    projet4.classList.add('active');
    projet2.classList.remove('active');
    projet3.classList.remove('active');
    projet1.classList.remove('active');
    projet5.classList.remove('active');
};

document.querySelector('#amenag').onclick = () =>{
    projet5.classList.add('active');
    projet2.classList.remove('active');
    projet3.classList.remove('active');
    projet1.classList.remove('active');
    projet4.classList.remove('active');
};


let navbar= document.querySelector(".header .navbar");
let searchForm= document.querySelector('.header .search-form');
let loginForm= document.querySelector('.header .login-form');
let contactInfo= document.querySelector('.contact-info');
//temoignage aussi
let sideInfo= document.querySelector('.temoignage-form');
//temoignage aussi


let temoignageForm= document.querySelector('.temoignage-form');





document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
};

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    navbar.classList.remove('active');
    loginForm.classList.remove('active');
};

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
};

document.querySelector('#info-btn').onclick = () =>{
    contactInfo.classList.add('active');
};

document.querySelector('#side-btn').onclick = () =>{
    sideInfo.classList.add('active');
};


// appel(ajoute) les formulaire


document.querySelector('#temo').onclick = () =>{
    temoignageForm.classList.add('active');
    sideInfo.classList.remove('active');
}

// appel(ajoute) les formulaire






document.querySelector('#close-contact-info').onclick = () =>{
    contactInfo.classList.remove('active');
};

document.querySelector('#close-side-info').onclick = () =>{
    sideInfo.classList.remove('active');
};


// retire(enleve) les formulaire



document.querySelector('#clt5').onclick = () =>{
    temoignageForm.classList.remove('active');
};

// retire(enleve) les formulaire



window.onscroll = () =>{
    navbar.classList.remove('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    contactInfo.classList.remove('active');
}


var swiper = new Swiper('.home-slider',{
    loop:true,
    grabCursor:true,
    navigation:{
        nextEl:'.swiper-button-next',
        prevEl:'.swiper-button-prev',
    }
})

var swiper = new Swiper(".reviews-slider",{
    loop:true,
    grabCursor:true,
    spaceBetween:20,
    breakpoints:{
        640:{
            slidesPerView: 1,
            
        },
        768:{
            slidesPerView: 2,
        },
        991:{
            slidesPerView: 3,
        },
    },
})


var swiper = new Swiper(".blogs-slider",{
    loop:true,
    grabCursor:true,
    spaceBetween:20,
    breakpoints:{
        640:{
            slidesPerView: 1,
            
        },
        768:{
            slidesPerView: 2,
        },
        991:{
            slidesPerView: 3,
        },
    },
})

