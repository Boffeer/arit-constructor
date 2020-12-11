const burgerButton = document.querySelector('.burger-btn');
const burgerMenu = document.querySelector('.nav-mobile');
let burgerIsOpen = false;

burgerButton.addEventListener('click', function() {
  document.querySelector('.burger-line').classList.toggle('burger-line--opened')
  document.querySelector('.nav-mobile').classList.toggle('nav-mobile--opened')
})

document.querySelector('.nav_item-lnk').addEventListener('click', function() {
  console.log('this')
  document.querySelector('.burger-line').classList.toggle('burger-line--opened')
  document.querySelector('.nav-mobile').classList.toggle('nav-mobile--opened')
})







const callbackHeader = document.querySelector('.header-contacts_callback');
const callbackModal = document.querySelector('.modal-callback_wrap');


function toggle(wrap, inner){
      let select = document.querySelector(wrap),
          compStyle = window.getComputedStyle(select),
          modal = document.querySelector('.modal-callback_wrap');
      if (compStyle.getPropertyValue('visibility') == 'hidden'){
        select.style.display = 'block';
        select.style.visibility = 'visible';
        select.style.opacity = '1';
        modal.style.transform = 'scale(1)';
      } else {
        select.style.display = 'none';
        select.style.visibility = 'hidden';
        select.style.opacity = '0';
        modal.style.transform = 'scale(0.2)';
      }
}
function modal(btn, modal){
  document.querySelector(btn).addEventListener("click", () => toggle(modal));
}
modal(".header-contacts_callback", ".modal-callback_wrap")
modal(".footer-btn", ".modal-callback_wrap")


modal(".catalog-item-buttons_more", ".modal-product-more_wrap")






modal(".catalog-item-buttons_order", ".modal-order_wrap-1")

modal(".catalog-item-buttons_order-2", ".modal-order_wrap-2")

modal(".catalog-item-buttons_order-3", ".modal-order_wrap-3")
modal(".catalog-item-buttons_order-4", ".modal-order_wrap-4")
modal(".catalog-item-buttons_order-5", ".modal-order_wrap-5")
modal(".catalog-item-buttons_order-6", ".modal-order_wrap-6")
modal(".catalog-item-buttons_order-7", ".modal-order_wrap-7")
modal(".catalog-item-buttons_order-8", ".modal-order_wrap-8")






modal(".certificate-slide-1", ".modal-certificate_wrap-1")
modal(".certificate-slide-2", ".modal-certificate_wrap-2")

modal(".footer-privacy", ".modal-privacy_wrap")


// modal(".portfolio_pic--red", ".modal-portfolio_wrap--red")
// modal(".portfolio_pic--white", ".modal-portfolio_wrap--white")




modal(".button-more2", ".modal-product-more_wrap2")
modal(".button-more3", ".modal-product-more_wrap3")
modal(".button-more4", ".modal-product-more_wrap4")
modal(".button-more5", ".modal-product-more_wrap5")
modal(".button-more6", ".modal-product-more_wrap6")
modal(".button-more7", ".modal-product-more_wrap7")
modal(".button-more8", ".modal-product-more_wrap8")




const quizNext = document.querySelector('.quiz-controls_next');
const quizPrev = document.querySelector('.quiz-controls_prev');
const progressBar = document.querySelector('.progress-bar_wrap');
const progressPoint = document.querySelector('.quiz-progress-bar_point');
let currentQuestion = 1;


quizNext.addEventListener('click', function(){
	document.querySelector('.quiz-page-'+currentQuestion)
		.classList.add('quiz-page--answered');
	currentQuestion++;

		document.querySelector('.quiz-page-'+currentQuestion)
			.classList.add('quiz-page--current');
	if (currentQuestion < 5){

		progressBar.classList.add('progress-bar_wrap--'+currentQuestion);
		
		document.querySelector('.quiz-progress-bar_point--'+currentQuestion)
			.classList.add('quiz-point--current');
	}
	if (currentQuestion == 5){
		quizNext.classList.add('hidden')
	}
	console.log(currentQuestion+ 'a')
})

quizPrev.addEventListener('click', function(){
	if (currentQuestion > 1){
		console.log(currentQuestion+ 'a')
		
		document.querySelector('.quiz-page-'+currentQuestion)
			.classList.remove('quiz-page--current');
		document.querySelector('.quiz-page-5')
			.classList.remove('quiz-page--current');

		currentQuestion--;
		progressBar.classList.remove('progress-bar_wrap--'+currentQuestion);

		document.querySelector('.quiz-progress-bar_point--'+currentQuestion)
			.classList.remove('quiz-point--current');
		document.querySelector('.quiz-page-'+currentQuestion)
			.classList.remove('quiz-page--answered');
		console.log(currentQuestion+'b')
		if (currentQuestion == 5){
			quizNext.classList.remove('hidden')
		}
	}


	// currentQuestion--;
	// document.querySelector('.quiz-page-'+currentQuestion)
	// 	.classList.add('quiz-page--current');

	
	// if (currentQuestion == 5){
	// 	quizNext.classList.add('hidden')
	// } else {
	// }
})




// const stepperInfo = document.querySelector('.order-stepper_count')
// const stepperPlus = document.querySelector('.order-stepper_minus')
// const stepperMinus = document.querySelector('.order-stepper_plus')
// let stepper = 1;


// stepperPlus.forEach((element) => {
//   element.addEventListener('click', function(){
//     stepper++
//     console.log(stepper)
//     stepperInfo.forEach(element) => {
//       stepperInfo.value = stepper
//     }
// })

// })


var productSlider = new Swiper('.modal-product-slider', {
  // loop: true,
  slidesPerGroup: 1,
  slidesPerView: 1,	
  // slidesOffsetBefore: 20,
  // slidesOffsetAfter: 20,
  // spaceBetween: 29,
//   // Navigation arrows
//   // slidesOffsetAfter: 100,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
      el: '.swiper-pagination.modal-product-pagination',
      type: 'bullets',
    },
})



var portfolioPop = new Swiper('.pop-portfolio-slider', {
  slidesPerGroup: 3,
  slidesPerView: 1, 

  // width: 300,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    768: {
      slidesPerGroup: 1,
      slidesPerView: 1, 
    },
    320:{
    slidesPerGroup: 1,
    slidesPerView: 1, 
    }

  }
})
var about = new Swiper('.about-slider', {
  slidesPerGroup: 3,
  slidesPerView: 1, 

  // width: 300,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
    768: {
      slidesPerGroup: 1,
      slidesPerView: 1, 
    },
    320:{
    slidesPerGroup: 1,
    slidesPerView: 1, 
    }

  }
})



var portfolio = new Swiper('.portfolio-slider-container', {
  // loop: true,
  slidesPerGroup: 3,
  slidesPerView: 3,	
  // slidesOffsetBefore: 20,
  // slidesOffsetAfter: 20,
  // spaceBetween: 29,
//   // Navigation arrows
//   // slidesOffsetAfter: 100,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  breakpoints: {
  	768: {
      slidesPerGroup: 1,
      slidesPerView: 1, 
  	},
    320:{
    slidesPerGroup: 1,
    slidesPerView: 1, 
    }

  }
})





var certificate = new Swiper('.certificates-slider-wrap', {
  // loop: true,
  slidesPerGroup: 2,
  slidesPerView: 2,	
  // slidesOffsetBefore: 20,
  // slidesOffsetAfter: 20,
  // spaceBetween: 29,
//   // Navigation arrows
//   // slidesOffsetAfter: 100,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
      el: '.swiper-pagination.certificate-pagination',
      type: 'bullets',
    },
    breakpoints: {
    	320: {
			slidesPerGroup: 1,
			slidesPerView: 1,	
    	},
    	768: { 
			slidesPerGroup: 2,
			slidesPerView: 2,
    	}
    }
})

var danger = new Swiper('.danger-slider-container', {
  // loop: true,
  slidesPerGroup: 1,
  slidesPerView: 1,	
  // slidesOffsetBefore: 20,
  // slidesOffsetAfter: 20,
  spaceBetween: 29,
//   // Navigation arrows
//   // slidesOffsetAfter: 100,
  navigation: {
    nextEl: '.swiper-button-next.danger-next',
    prevEl: '.swiper-button-prev.danger-prev',
  },
  pagination: {
      el: '.swiper-pagination.danger-pagination',
      type: 'bullets',
    },
})


// document.querySelectorAll('a[href^="#"]').forEach(anchor => {
//     anchor.addEventListener('click', function (e) {
//         e.preventDefault();

//         document.querySelector(this.getAttribute('href')).scrollIntoView({
//             behavior: 'smooth'
//         });
//     });
// });

const anchors = document.querySelectorAll('a[href*="#"]')

anchors.forEach((anchor) => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault()
    
    const blockID = anchor.getAttribute('href').substr(1)
    
    document.getElementById(blockID).scrollIntoView({
      behavior: 'smooth',
      block: 'start'
    })
    document.querySelector('.burger-line').classList.toggle('burger-line--opened')
    document.querySelector('.nav-mobile').classList.toggle('nav-mobile--opened')
  })
})