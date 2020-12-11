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



modal(".catalog-item-buttons_order", ".modal-order_wrap")

modal(".certificate-slide", ".modal-certificate_wrap")

modal(".footer-privacy", ".modal-privacy_wrap")










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
		// currentQuestion--
	}
	console.log(currentQuestion)
})

quizPrev.addEventListener('click', function(){
	if (currentQuestion > 1){
		console.log(currentQuestion)
		
		document.querySelector('.quiz-page-'+currentQuestion)
			.classList.remove('quiz-page--current');
		document.querySelector('.quiz-page-5')
			.classList.remove('quiz-page--current');

		progressBar.classList.remove('progress-bar_wrap--'+currentQuestion);

		document.querySelector('.quiz-progress-bar_point--'+currentQuestion)
			.classList.remove('quiz-point--current');
		currentQuestion--
			document.querySelector('.quiz-page-'+currentQuestion)
			.classList.remove('quiz-page--answered');

		if (currentQuestion < 5){
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











var mySwiper = new Swiper('.modal-product-slider', {
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
      el: '.swiper-pagination',
      type: 'bullets',
    },
})



var mySwiper = new Swiper('.portfolio-slider', {
  // loop: true,
  slidesPerGroup: 2,
  slidesPerView: 2,	
  // slidesOffsetBefore: 20,
  // slidesOffsetAfter: 20,
  spaceBetween: 29,
//   // Navigation arrows
//   // slidesOffsetAfter: 100,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },
  breakpoints: {
  	768: {
  		init: false
  	}
  }
})





var mySwiper = new Swiper('.certificates-slider-wrap', {
  // loop: true,
  slidesPerGroup: 2,
  slidesPerView: 2,	
  // slidesOffsetBefore: 20,
  // slidesOffsetAfter: 20,
  spaceBetween: 29,
//   // Navigation arrows
//   // slidesOffsetAfter: 100,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },
})