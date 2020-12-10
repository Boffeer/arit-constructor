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
		currentQuestion--
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

















var mySwiper = new Swiper('.swiper-container', {
  loop: true,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  slidesOffsetBefore: 50,
})