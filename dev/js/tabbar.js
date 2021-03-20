
// Learning tabs
//
const firstTabHandler = document.querySelector('.js-program-tabs__control--theory');
const firstTab = document.querySelector('.program-tab--theory');
const secondTabHandler = document.querySelector('.js-program-tabs__control--practice');
const secondTab = document.querySelector('.program-tab--practice');
const activeHandlerClass = 'program-tabs__control--current';
const activeTabClass = 'program-tab--current';

firstTabHandler.addEventListener('click', function(){
	this.classList.add(activeHandlerClass);
	firstTab.classList.add(activeTabClass);
	secondTabHandler.classList.remove(activeHandlerClass);
	secondTab.classList.remove(activeTabClass);
	document.getElementById('program').scrollIntoView({
		behavior: 'smooth',
		block: 'start'
	})
})
secondTabHandler.addEventListener('click', function(){
	this.classList.add(activeHandlerClass);
	secondTab.classList.add(activeTabClass);
	firstTabHandler.classList.remove(activeHandlerClass);
	firstTab.classList.remove(activeTabClass);
	document.getElementById('program').scrollIntoView({
		behavior: 'smooth',
		block: 'start'
	})
})


const anchors = document.querySelectorAll('a[href*="#"]')

for (let anchor of anchors) {
	anchor.addEventListener('click', function (e) {
		e.preventDefault()
		const blockID = anchor.getAttribute('href').substr(1)
		document.getElementById(blockID).scrollIntoView({
			  behavior: 'smooth',
			  block: 'start'
		})
	})
}

