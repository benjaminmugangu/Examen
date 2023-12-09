'use strict';



let sideInfo= document.querySelector('.temoignage-form');


document.querySelector('#side-btn').onclick = () =>{
  sideInfo.classList.add('active');
};

document.querySelector('#clt5').onclick = () =>{
  sideInfo.classList.remove('active');
};