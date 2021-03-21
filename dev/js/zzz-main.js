let phoneInput = [...document.querySelectorAll('.input--phone')];

phoneInput.map(item => {
	item.addEventListener('keydown', function(event){
		if (!(event.key == 'ArrowLeft' || event.key == 'ArrowRight' || event.key == 'Backspace' || event.key == 'Tab')) {
			event.preventDefault()
		}
		let mask = '+7 (111) 111-11-11';
		if (/[0-9\+\ \-\(\)]/.test(event.key)) {
			let currentString = this.value;
			let currentLength = currentString.length;
			if (/[0-9]/.test(event.key)) {
				if (mask[currentLength] == '1') {
					this.value = currentString + event.key;
				} else {
					for (let i = currentLength; i < mask.length; i++) {
						if (mask[i] == '1') {
							this.value = currentString + event.key;
							break;
						}
						currentString += mask[i]
					}
				}
			}
		}
	})
})



popa({
	clickTrigger: '.hero-video',
	popWrap: '.pop-video-wrapper',
	pop: '.pop-video',
	popCloser: '.pop-closer',
})



if (startTestimonialSlider) {
	const testimonialsSlider = new Swiper('.testimonials-slider', {
		slidesPerView: 1,
		spaceBetween: 19,
		pagination: {
			el: '.swiper-pagination.testimonials-pagination',
		},
		breakpoints: {
			1300: {
				slidesPerView: 3,
				navigation: {
					nextEl: '.swiper-button-next.testimonials-button-next',
					prevEl: '.swiper-button-prev.testimonials-button-prev',
				},
			}
		},
			
	})
}
