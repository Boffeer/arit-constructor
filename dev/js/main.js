








	const burgerButton = document.querySelector('.burger-btn');
	const burgerMenu = document.querySelector('.nav-mobile');
	let burgerIsOpen = false;

	burgerButton.addEventListener('click', function() {
	  document.querySelector('.burger-line').classList.toggle('burger-line--opened')
	  document.querySelector('.nav-mobile').classList.toggle('nav-mobile--opened')
	})

	document.querySelector('.nav_item-lnk').addEventListener('click', function() {
	  // console.log('this')
	  document.querySelector('.burger-line').classList.toggle('burger-line--opened')
	  document.querySelector('.nav-mobile').classList.toggle('nav-mobile--opened')
	})



	document.querySelector('.quiz-controls_prev').addEventListener('click', function(){
		document.querySelector('.quiz-controls_next').classList.remove('hidden');
	});



	const callbackHeader = document.querySelector('.header-contacts_callback');
	const callbackModal = document.querySelector('.modal-callback_wrap');





	const quizNext = document.querySelector('.quiz-controls_next');
	const quizPrev = document.querySelector('.quiz-controls_prev');
	const progressBar = document.querySelector('.progress-bar_wrap');
	const progressPoint = document.querySelector('.quiz-progress-bar_point');
	let currentQuestion = 1;
	let question1isAnswered = false;
	let question2isAnswered = false;
	let question3isAnswered = false;
	let question4isAnswered = false;


	quizNext.addEventListener('click', function(){
		if ((question1isAnswered == false) && currentQuestion == 1) {
			ym(70602433,'reachGoal','quiz-step-1')
			question1isAnswered = true;
			// console.log('is' + currentQuestion)
		}
		if ((currentQuestion == 2) && (question2isAnswered == false)) {
			ym(70602433,'reachGoal','quiz-step-2')
			question2isAnswered = true;
			// console.log('is' + currentQuestion)
		}

		if ((currentQuestion == 3) && (question3isAnswered == false)) {
			ym(70602433,'reachGoal','quiz-step-3')
			question3isAnswered = true;
			// console.log('is' + currentQuestion)
		}

		if ((currentQuestion == 4) && (question4isAnswered == false)) {
			ym(70602433,'reachGoal','quiz-step-4')
			question4isAnswered = true;
			// console.log('is' + currentQuestion)
		}


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
			// console.log(currentQuestion+ 'a')
			
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
			// console.log(currentQuestion+'b')
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
	    // console.log(stepper)
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
	    nextEl: '.swiper-button-next.modal-product-next',
	    prevEl: '.swiper-button-prev.modal-product-prev',
	  },
	  pagination: {
	      el: '.swiper-pagination.modal-product-pagination',
	      type: 'bullets',
	    },
	})



	// var portfolioPop = new Swiper('.pop-portfolio-slider', {
	//   // slidesPerGroup: 3,
	//   slidesPerView: 3, 

	//   // width: 300,
	//   navigation: {
	//     nextEl: '.swiper-button-next',
	//     prevEl: '.swiper-button-prev',
	//   },
	//   breakpoints: {
	//     768: {
	//       slidesPerGroup: 1,
	//       slidesPerView: 1, 
	//     },
	//     320:{
	//     slidesPerGroup: 1,
	//     slidesPerView: 1, 
	//     }

	//   }
	// })
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
	      spaceBetween: 30,
	      slidesPerGroup: 1,
	      slidesPerView: 1, 
	    },
	    320:{
	      spaceBetween: 30,
	      slidesPerGroup: 1,
	      slidesPerView: 1, 
	    }

	  }
	})



	var portfolio = new Swiper('.swiper-container.portfolio-slider-container', {
	  // loop: true,
	  // slidesPerGroup: 1,
	  // slidesPerView: 'auto',
	  slidesPerView: 3,
	  // watchOverflow: true,
	  // centeredSlides: true,
	  // slidesOffsetBefore: 170,
	  // slidesOffsetBefore: 20,
	  // slidesOffsetAfter: 20,
	  // spaceBetween: 29,
	//   // Navigation arrows
	//   // slidesOffsetAfter: 100,
	  navigation: {
	    nextEl: '.swiper-button-next.portfolio-next',
	    prevEl: '.swiper-button-prev.portfolio-prev',
	  },
	  breakpoints: {
	  	768: {
		  spaceBetween: 20,

	      // slidesOffsetBefore: 20,
	      slidesPerGroup: 3,
	      slidesPerView: 3, 
	  	},
	    320:{
		  spaceBetween: 20,
	    // slidesOffsetBefore: 20,
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
	    nextEl: '.swiper-button-next.certificates-next',
	    prevEl: '.swiper-button-prev.certificates-prev',
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
	let countCerteficates = document.querySelectorAll('.certificate-slide').length

	if ((window.innerWidth > 768) && (countCerteficates < 3)) {
	  document.querySelector('.certificates-prev').classList.add('slider-hidden')
	  document.querySelector('.certificates-next').classList.add('slider-hidden')
	  document.querySelector('.certificate-pagination').classList.add('slider-hidden')
	}




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
	});


	// document.querySelectorAll('a[href^="#"]').forEach(anchor => {
	//     anchor.addEventListener('click', function (e) {
	//         e.preventDefault();

	//         document.querySelector(this.getAttribute('href')).scrollIntoView({
	//             behavior: 'smooth'
	//         });
	//     });
	// });

	const anchorTag = document.querySelectorAll('a[href*="#"]');

	anchorTag.forEach((anchorItem) => {
	  anchorItem.addEventListener('click', function (e) {
	    e.preventDefault()
	    
	    const blockID = anchorItem.getAttribute('href').substr(1)
	    
	    document.getElementById(blockID).scrollIntoView({
	      behavior: 'smooth',
	      block: 'start'
	    })
	    document.querySelector('.burger-line').classList.toggle('burger-line--opened')
	    document.querySelector('.nav-mobile').classList.toggle('nav-mobile--opened')
	  })
	});



	jQuery( document ).ready(function($) {
	  


	  	$('.header-contacts_callback').click(function(){ 
	  		$('.modal-callback_wrap').fadeIn()
	  	})
	  	$('.footer-btn').click(function(){ 
	  		$('.modal-callback_wrap').fadeIn()
	  	})


	  	// order
		$('.catalog-item-buttons_order').each(function(i, obj){
			$(this).click(function(){
				let id = $(this).data('id');
				let info = $('.hidden-catalog-item_info-' + id);
				let productName = info.data('name');
				let productPrice = info.data('price');
				let productVolume = info.data('volume');
				let productU = info.data('u');
				let productSize = info.data('size');
				let productLamp = info.data('lamp');
				let productCapacity = info.data('capacity');
				let productDescr = info.data('descr');
				let productPic = info.data('pic');


				$('.order-details-name_model').text(productName)
				$('.hidden-modal-order_product').val(productName).change()
				$('.hidden-modal-order_price').val(productPrice).change()

				$('.order-details_pic img').attr('src', productPic)
				$('.order-details-name_capacity--inner').text(productCapacity)

				$('.hidden-product-more-model').attr('value', productName);
				$('.hidden-product-more-price').attr('value', productPrice);

				$('.modal-order_wrap').fadeIn();
			})
		})

		// more
		$('.catalog-item-buttons_more').each(function(i, obj){
			$(this).click(function(){
				let id = $(this).data('id');
				let info = $('.hidden-catalog-item_info-' + id);
				let productName = info.data('name');
				let productPrice = info.data('price');
				let productVolume = info.data('volume');
				let productU = info.data('u');
				let productSize = info.data('size');
				let productLamp = info.data('lamp');
				let productWeight = info.data('weight');
				let productCapacity = info.data('capacity');
				let productDescr = info.data('descr');
				let productPic = info.data('pic');
				// console.log([productName, productPrice, productVolume, productU, productSize, productLamp, productCapacity, productDescr])

				let sl1 = info.data('slider1');
				let sl2 = info.data('slider2');
				let sl3 = info.data('slider3');
				let sl4 = info.data('slider4');
				let sl5 = info.data('slider5');

				if (sl1 != undefined) {
					$('.modal-product-wrapper').append(`<div class="swiper-slide">
	                              <picture class="modal-product_pic"><img src="<?php echo the_field('slider-1')?>" alt="product"/></picture>
	                            </div>`)
					console.log(sl1)
				}
				if (sl2 != undefined) {
					$('.modal-product-wrapper').append(`<div class="swiper-slide">
	                              <picture class="modal-product_pic"><img src="<?php echo the_field('slider-2')?>" alt="product"/></picture>
	                            </div>`)
					console.log(sl2)
		
				}

				if (sl3 != undefined) {
					$('.modal-product-wrapper').append(`<div class="swiper-slide">
	                              <picture class="modal-product_pic"><img src="<?php echo the_field('slider-3')?>" alt="product"/></picture>
	                            </div>`)
					console.log(sl3)

				}
				if (sl4 != undefined) {
					$('.modal-product-wrapper').append(`<div class="swiper-slide">
	                              <picture class="modal-product_pic"><img src="<?php echo the_field('slider-4')?>" alt="product"/></picture>
	                            </div>`)
					console.log(sl3)

				}
				if (sl5 != undefined) {
					$('.modal-product-wrapper').append(`<div class="swiper-slide">
	                              <picture class="modal-product_pic"><img src="<?php echo the_field('slider-5')?>" alt="product"/></picture>
	                            </div>`)
				}


				$('.modal-product-stats-name_model').text(productName);
				$('.modal-product-stats-name_capability--value').text(productCapacity);
				$('.modal-product-stats-name_volume--value').text(productVolume);
				$('.modal-product-stats-name_u--value').text(productU);
				$('.modal-product-stats-name_sizes--value').text(productSize);
				$('.modal-product-sizes_value--weight').text(productWeight);
				$('.modal-product-additional--lamp').text(productLamp);
				$('.modal-product-includes_title').html(productDescr);

				$('.hidden-product-more-model').attr('value', productName);
				$('.hidden-product-more-price').attr('value', productPrice);			

				// $('.hidden-modal-order_product').val(productName).change()
				// $('.hidden-modal-order_price').val(productPrice).change()

				// $('.modal-product_pic img').attr('src', productPic)



				$('.modal-product-more_wrap').fadeIn();
			})
		})



		let stepperPosition = 1;
		$('.order-stepper_plus').click(function(){
			stepperPosition++;
			$('.order-stepper_count').val(stepperPosition).change()
			$('.hidden-product-quantity').val(stepperPosition).change()
		})
		$('.order-stepper_minus').click(function(){

			if (stepperPosition > 1) {
				stepperPosition--;
				$('.order-stepper_count').val(stepperPosition).change()
				$('.hidden-product-quantity').val(stepperPosition).change()
			}
		})





		$('.modal-close-btn').click(function(){
			let modalWrapper = $(this).data('close');
			$(modalWrapper).fadeOut()
		})

		$('.certificate-slide').click(function(){
			let modalWrapper = $(this).data('open')
			$(modalWrapper).fadeIn()
		})

		let radioId;
		let quizClickCounter = 0;
		let lastRadio;
		$('.quiz-anser-item_text').each(function(i, obj){
			$(this).click(function(){
				// if (quizClickCounter > 1) {
				// 		lastRadio = radioId;
				// 		$(lastRadio).removeClass('quiz-anser-item_chekbox--checked last-checked')
						console.log(lastRadio)
				// }
				// radioId = $('.quiz-answer-item_input').prop('id');
					console.log(radioId)
				// quizClickCounter++;
				console.log(quizClickCounter)



					// $('#'+radioId+'s').addClass('quiz-anser-item_chekbox--checked last-checked')
			});
		})

		jQuery('.quiz-answer-item_input').click(function() {
			let anwser = $(this).val();
			let memory = $(this).attr('name');
			// console.log(anwser)
			// console.log(memory)
			$('#'+memory).attr('value', anwser);


		});
		// ready end





	//=== Masks ===

	var elements = document.querySelectorAll('input[type="tel"]');
	for (var i = 0; i < elements.length; i++) {
	  new IMask(elements[i], {
	    mask: '+{7}(000) 000-00-00',
	  });
	}







		// Metrika

		jQuery('.header-contacts_callback').click(function(){
			ym(70602433,'reachGoal','phone-click')
		});	

		jQuery('.footer-phone').click(function(){
			ym(70602433,'reachGoal','footer-phone')
		});
		jQuery('.whatsapp-lnk').click(function(){
			ym(70602433,'reachGoal','wa-static')
		});
		jQuery('.footer-social-link').click(function(){
			ym(70602433,'reachGoal','wa-static')
		});



		jQuery('.modal-callback form').submit(function(){
			ym(70602433,'reachGoal','header-callback')
		});



		jQuery('.modal-order form').submit(function(){
			ym(70602433,'reachGoal','catalog-order')
		});

		jQuery('.modal-product-form form').submit(function(){
			ym(70602433,'reachGoal','catalog-more')
		});

		jQuery('.quiz-page-5 form').submit(function(){
			ym(70602433,'reachGoal','quiz-finish')
		});

		jQuery('.pricing-form form').submit(function(){
			ym(70602433,'reachGoal','wholesale-pricelist')
		});

		jQuery('main').activity({
		    'achieveTime':60
		    ,'testPeriod':10
		    ,useMultiMode: 1
		    ,callBack: function (e) {
		      // ga('send', 'event', 'Activity', '60_sec');
		      ym(70602433,'reachGoal','60-sec')
		      // console.log('Минута');
		    }
		});
	});
		