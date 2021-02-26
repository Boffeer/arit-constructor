function showPop($popWrap, $pop) {
	$popWrap.classList.add('pop-wrap--opened')
	$pop.classList.add('pop--opened');
	document.querySelector('html').classList.add('pop-opened--html')
}

function closePop($popWrap, $pop) {
	$popWrap.classList.remove('pop-wrap--opened')
	$pop.classList.remove('pop--opened');
	document.querySelector('html').classList.remove('pop-opened--html')
}

function popToggle($popWrap, $pop){
	let popWrap = $popWrap,
		isPopHidden = window.getComputedStyle(popWrap).getPropertyValue('visibility') == 'hidden',
		pop = $pop;
	isPopHidden
		? showPop(popWrap, pop)
		: closePop(popWrap, pop)
}

function popa(data){
	data.clickTrigger.addEventListener("click", () => popToggle(data.popWrap, data.pop));
	data.popCloser.addEventListener('click', () => closePop(data.popWrap, data.pop));
}

const btn = document.querySelector('.pop-opener');
const closeBtn = document.querySelector('.pop-closer');
const popWrap = document.querySelector('.pop-wrap');
const pop = document.querySelector('.pop');

popa({
	clickTrigger: btn,
	popWrap: popWrap,
	pop: pop,
	popCloser: closeBtn,
})

// btn.addEventListener("click", () => popToggle(popWrap, pop));
//// create the container div
var newWrapper = document.createElement('div');
// get all divs
var divs = document.querySelectorAll('.pop-opener');
// get the body element
var body = document.getElementsByTagName('body')[0];

// apply class to container div
newWrapper.setAttribute('class', 'container');

// find out all those divs having class C
for(var i = 0; i < divs.length; i++)
{
   if (divs[i].getAttribute('class') === 'C')
   {
      // put the divs having class C inside container div
      newWrapper.appendChild(divs[i]);
   }
}

// finally append the container div to body
body.appendChild(newWrapper);

