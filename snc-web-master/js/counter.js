

let a = document.getElementsByClassName('counter-box');
a =a[0];
let Tpheight = a.scrollHeight;

if(window.innerWidth<=400){
	Tpheight = Tpheight-200;
}
else{
	Tpheight = Tpheight+200;
}


window.addEventListener('scroll',scrollFunc);
function scrollFunc(event){
	//console.log(document.documentElement.scrollTop);
	if (document.body.scrollTop > Tpheight || document.documentElement.scrollTop > Tpheight) {
    	let initalNumber = a.children[0].children[0].children[0].innerText
    	//console.log(initalNumber)
    	if(initalNumber==""){
    		console.log(Tpheight);
		    	(function ($) {
					$.fn.countTo = function (options) {
						options = options || {};
						
						return $(this).each(function () {
							// set options for current element
							let settings = $.extend({}, $.fn.countTo.defaults, {
								from:            $(this).data('from'),
								to:              $(this).data('to'),
								speed:           $(this).data('speed'),
								refreshInterval: $(this).data('refresh-interval'),
								decimals:        $(this).data('decimals')
							}, options);
							
							// how many times to update the value, and how much to increment the value on each update
							let loops = Math.ceil(settings.speed / settings.refreshInterval),
								increment = (settings.to - settings.from) / loops;
							
							// references & variables that will change with each update
							let self = this,
								$self = $(this),
								loopCount = 0,
								value = settings.from,
								data = $self.data('countTo') || {};
							
							$self.data('countTo', data);
							
							// if an existing interval can be found, clear it first
							if (data.interval) {
								clearInterval(data.interval);
							}
							data.interval = setInterval(updateTimer, settings.refreshInterval);
							
							// initialize the element with the starting value
							render(value);
							
							function updateTimer() {
								value += increment;
								loopCount++;
								
								render(value);
								
								if (typeof(settings.onUpdate) == 'function') {
									settings.onUpdate.call(self, value);
								}
								
								if (loopCount >= loops) {
									// remove the interval
									$self.removeData('countTo');
									clearInterval(data.interval);
									value = settings.to;
									
									if (typeof(settings.onComplete) == 'function') {
										settings.onComplete.call(self, value);
									}
								}
							}
							
							function render(value) {
								let formattedValue = settings.formatter.call(self, value, settings);
								$self.html(formattedValue + '+');
								let clubValue = document.getElementById('clubCounter').innerHTML;
								if (clubValue.indexOf(17) !== -1) document.getElementById('clubCounter').innerHTML = document.getElementById('clubCounter').innerHTML.replace('+', '');
							}
						});
					};
					
					$.fn.countTo.defaults = {
						from: 0,               // the number the element should start at
						to: 0,                 // the number the element should end at
						speed: 1000,           // how long it should take to count between the target numbers
						refreshInterval: 100,  // how often the element should be updated
						decimals: 0,           // the number of decimal places to show
						formatter: formatter,  // handler for formatting the value before rendering
						onUpdate: null,        // callback method for every time the element is updated
						onComplete: null       // callback method for when the element finishes updating
					};
					
					function formatter(value, settings) {
						return value.toFixed(settings.decimals);
					}
				}(jQuery));

				jQuery(function ($) {
				  // custom formatting example
				  $('.count-number').data('countToOptions', {
					formatter: function (value, options) {
					  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
					}
				  });
				  
				  // start all the timers
				   $('.timer').each(count); 
				  
				  function count(options) {
					let $this = $(this);
					options = $.extend({}, options || {}, $this.data('countToOptions') || {});
					$this.countTo(options);
				  }
				});
			}
  	} else {
    	//a.style.visibility = "hidden";
  	}
}