$(".box").on({
	mouseover:function(){
		$(this).find("img:nth-child(1)").stop().animate({opacity:0},600);
		$(this).find("img:nth-child(2)").stop().animate({opacity:1},600);
	}, mouseout:function(){
		$(this).find("img:nth-child(1)").stop().animate({opacity:1},600);
		$(this).find("img:nth-child(2)").stop().animate({opacity:0},600);
	} 
});

// ========== stats query

const counters = document.querySelectorAll('.count');
const speed = 200;

counters.forEach((counter) => {
	const updateCount = () => {
		const target = parseInt(counter.getAttribute('data-target'));
		const count = parseInt(counter.innerText);
		const increment = Math.trunc(target / speed);

		if (count < target) {
			counter.innerText = count + increment;
			setTimeout(updateCount, 1);
		} else {
			counter.innerText = target;
		}
	};
	updateCount();
});

$(document).ready(function () {
	$(window).scroll(function () {
		var showAfter = 100;
		if ($(this).scrollTop() > showAfter) {
			$('#top').fadeIn();
		} else {
			$('#top').fadeOut();
		}
	});
	$('#top').click(function () {
		$('html,body').animate({ scrollTop: 0 }, 200);
		return false; 
	})
})


// tabs