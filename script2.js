let navbar= document.querySelector(".header .navbar");
let searchForm= document.querySelector('.header .search-form');
let loginForm= document.querySelector('.header .login-form');
let contactInfo= document.querySelector('.contact-info');
let sideInfo= document.querySelector('.side-info');


let clientForm= document.querySelector('.client-form');
let entrepriseForm= document.querySelector('.entreprise-form');
let employerForm= document.querySelector('.employer-form');
let projetForm= document.querySelector('.projet-form');
let serviceForm= document.querySelector('.service-form');
let temoignageForm= document.querySelector('.temoignage-form');
let constructionForm= document.querySelector('.construction-form');
let plomberieForm= document.querySelector('.plomberie-form');
let electriciteForm= document.querySelector('.electricite-form');
let amenaagementForm= document.querySelector('.amenagement-form');
let terassementForm= document.querySelector('.terassement-form');





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

document.querySelector('#clie').onclick = () =>{
    clientForm.classList.add('active');
    sideInfo.classList.remove('active');

    entrepriseForm.classList.remove('active');
    employerForm.classList.remove('active');
    projetForm.classList.remove('active');
    serviceForm.classList.remove('active');
    temoignageForm.classList.remove('active');
};

document.querySelector('#temo').onclick = () =>{
    temoignageForm.classList.add('active');
    sideInfo.classList.remove('active');

    clientForm.classList.remove('active');
    entrepriseForm.classList.remove('active');
    employerForm.classList.remove('active');
    projetForm.classList.remove('active');
    serviceForm.classList.remove('active');
};

document.querySelector('#entr').onclick = () =>{
    entrepriseForm.classList.add('active');
    sideInfo.classList.remove('active');

    clientForm.classList.remove('active');
    employerForm.classList.remove('active');
    projetForm.classList.remove('active');
    serviceForm.classList.remove('active');
    temoignageForm.classList.remove('active');
};

document.querySelector('#empl').onclick = () =>{
    employerForm.classList.add('active');
    sideInfo.classList.remove('active');

    clientForm.classList.remove('active');
    entrepriseForm.classList.remove('active');
    projetForm.classList.remove('active');
    serviceForm.classList.remove('active');
    temoignageForm.classList.remove('active');
};

document.querySelector('#proj').onclick = () =>{
    projetForm.classList.add('active');
    sideInfo.classList.remove('active');

    clientForm.classList.remove('active');
    entrepriseForm.classList.remove('active');
    employerForm.classList.remove('active');
    serviceForm.classList.remove('active');
    temoignageForm.classList.remove('active');
};

document.querySelector('#serv').onclick = () =>{
    serviceForm.classList.add('active');
    sideInfo.classList.remove('active');

    clientForm.classList.remove('active');
    entrepriseForm.classList.remove('active');
    employerForm.classList.remove('active');
    projetForm.classList.remove('active');
    temoignageForm.classList.remove('active');
};


document.querySelector('#construction').onclick = () =>{
    constructionForm.classList.add('active');
    electriciteForm.classList.remove('active');
    plomberieForm.classList.remove('active');
    amenaagementForm.classList.remove('active');
    terassementForm.classList.remove('active');


    temoignageForm.classList.remove('active');
    sideInfo.classList.remove('active');

    clientForm.classList.remove('active');
    entrepriseForm.classList.remove('active');
    employerForm.classList.remove('active');
    projetForm.classList.remove('active');
    serviceForm.classList.remove('active');
};


document.querySelector('#plomberie').onclick = () =>{
    constructionForm.classList.remove('active');
    electriciteForm.classList.remove('active');
    plomberieForm.classList.add('active');
    amenaagementForm.classList.remove('active');
    terassementForm.classList.remove('active');


    temoignageForm.classList.remove('active');
    sideInfo.classList.remove('active');

    clientForm.classList.remove('active');
    entrepriseForm.classList.remove('active');
    employerForm.classList.remove('active');
    projetForm.classList.remove('active');
    serviceForm.classList.remove('active');
};


document.querySelector('#electricite').onclick = () =>{
    constructionForm.classList.remove('active');
    electriciteForm.classList.add('active');
    plomberieForm.classList.remove('active');
    amenaagementForm.classList.remove('active');
    terassementForm.classList.remove('active');


    temoignageForm.classList.remove('active');
    sideInfo.classList.remove('active');

    clientForm.classList.remove('active');
    entrepriseForm.classList.remove('active');
    employerForm.classList.remove('active');
    projetForm.classList.remove('active');
    serviceForm.classList.remove('active');
};

document.querySelector('#amenagement').onclick = () =>{
    constructionForm.classList.remove('active');
    electriciteForm.classList.remove('active');
    plomberieForm.classList.remove('active');
    amenaagementForm.classList.add('active');
    terassementForm.classList.remove('active');


    temoignageForm.classList.remove('active');
    sideInfo.classList.remove('active');

    clientForm.classList.remove('active');
    entrepriseForm.classList.remove('active');
    employerForm.classList.remove('active');
    projetForm.classList.remove('active');
    serviceForm.classList.remove('active');
};


document.querySelector('#terassement').onclick = () =>{
    constructionForm.classList.remove('active');
    electriciteForm.classList.remove('active');
    plomberieForm.classList.remove('active');
    amenaagementForm.classList.remove('active');
    terassementForm.classList.add('active');


    temoignageForm.classList.remove('active');
    sideInfo.classList.remove('active');

    clientForm.classList.remove('active');
    entrepriseForm.classList.remove('active');
    employerForm.classList.remove('active');
    projetForm.classList.remove('active');
    serviceForm.classList.remove('active');
};
// appel(ajoute) les formulaire






document.querySelector('#close-contact-info').onclick = () =>{
    contactInfo.classList.remove('active');
};

document.querySelector('#close-side-info').onclick = () =>{
    sideInfo.classList.remove('active');
};


// retire(enleve) les formulaire

// document.querySelector('#clt').onclick = () =>{
//     clientForm.classList.remove('active');   
// };

// document.querySelector('#clt1').onclick = () =>{
//     entrepriseForm.classList.remove('active');
// };

// document.querySelector('#clt2').onclick = () =>{
//     employerForm.classList.remove('active');
// };

// document.querySelector('#clt3').onclick = () =>{
//     projetForm.classList.remove('active');
// };

// document.querySelector('#clt4').onclick = () =>{
//     serviceForm.classList.remove('active');
// };

// document.querySelector('#clt5').onclick = () =>{
//     temoignageForm.classList.remove('active');
// };

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