// const input = [...document.querySelectorAll(".input--phone")];
//
// const prefixNumber = (str) => {
//   if (str === "7") {
//     return "7 (";
//   }
//   if (str === "8") {
//     return "7 (8";
//   }
//   if (str === "9") {
//     return "7 (9";
//   }
//   return "7 (";
// };
//
// // ======================================
//
// input.map(function(item){
//
//   item.addEventListener("input", (e) => {
//   // TODO CROSS ????
//   // if (e.inputType === "deleteContentBackward") {
//   //   return;
//   // }
//
//   // console.log(input.value);
//   // if (input.value.includes("@")) {
//   //   const value = input.value.replace(/[+)()\s]/g, "");
//   //   input.value = value;
//   //   return;
//   // }
//   //replace('/[^\d-]+/'
//   let result = "+";
//   const value = item.value.replace(/\D+/g, "");
//   const numberLength = 11;
//   //
//   for (let i = 0; i < value.length && i < numberLength; i++) {
//     switch (i) {
//       case 0:
//         result += prefixNumber(value[i]);
//         continue;
//       case 4:
//         result += ") ";
//         break;
//       case 7:
//         result += "-";
//         break;
//       case 9:
//         result += "-";
//         break;
//       default:
//         break;
//     }
//     result += value[i];
//   }
//   //
//   item.value = result;
// });
// })
// ======================================










//
//
//
//
	// item.addEventListener('keydown', function(event){
	// item.addEventListener('change', function(event){
	//   if (!(event.key == 'ArrowLeft' || event.key == 'ArrowRight' || event.key == 'Backspace' || event.key == 'Tab')) {
	//     event.preventDefault()
	//   }
	//   let mask = '+7 (111) 111-11-11';
	//   if (/[0-9\+\ \-\(\)]/.test(event.key)) {
	//     let currentString = this.value;
	//     let currentLength = currentString.length;
	//     if (/[0-9]/.test(event.key)) {
	//       if (mask[currentLength] == '1') {
	//         this.value = currentString + event.key;
	//       } else {
	//         for (let i = currentLength; i < mask.length; i++) {
	//           if (mask[i] == '1') {
	//             this.value = currentString + event.key;
	//             break;
	//           }
	//           currentString += mask[i]
	//         }
	//       }
	//     }
	//   }
	// })


// if ((startTestimonialSlider != null) && (startTestimonialSlider != undefined)) {
//   var testimonialsSlider = new Swiper('.testimonials-slider', {
//     slidesPerView: 1,
//     spaceBetween: 19,
//     pagination: {
//       el: '.swiper-pagination.testimonials-pagination',
//     },
//     breakpoints: {
//       1300: {
//         slidesPerView: 3,
//         navigation: {
//           nextEl: '.swiper-button-next.testimonials-button-next',
//           prevEl: '.swiper-button-prev.testimonials-button-prev',
//         },
//       }
//     },
//
//   })
// }

if ((document.querySelector('.hero-video') != null)) {
	popa({
		clickTrigger: '.hero-video',
		popWrap: '.pop-video-wrapper',
		pop: '.pop-video',
		popCloser: '.pop-closer',
	})
}

const emails = [...document.querySelectorAll('.contacts-item--email')];
emails.map(item => {
	item.addEventListener('click', function(){
		ym(74415211,'reachGoal','email');
	});
});


const phones = [...document.querySelectorAll('.contacts-item--phone')];
phones.map(item => {
	item.addEventListener('click', function(){
		ym(74415211,'reachGoal','phone');
	});
});


document.querySelector('.hero-form').addEventListener('submit', function(){
	ym(74415211,'reachGoal','hero-form');
})
document.querySelector('.lead-form__form').addEventListener('submit', function(){
	ym(74415211,'reachGoal','footer-form');
})
