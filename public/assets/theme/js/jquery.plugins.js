/* ===============================
    Headline Animator: 
=================================== */

jQuery(document).ready(function($){
	//set animation timing
	var animationDelay = 2500,
		//loading bar effect
		barAnimationDelay = 3800,
		barWaiting = barAnimationDelay - 3000, //3000 is the duration of the transition on the loading bar - set in the scss/css file
		//letters effect
		lettersDelay = 50,
		//type effect
		typeLettersDelay = 150,
		selectionDuration = 500,
		typeAnimationDelay = selectionDuration + 800,
		//clip effect 
		revealDuration = 600,
		revealAnimationDelay = 1500;
	
	initHeadline();
	

	function initHeadline() {
		//insert <i> element for each letter of a changing word
		singleLetters($('.cd-headline.letters').find('b'));
		//initialise headline animation
		animateHeadline($('.cd-headline'));
	}

	function singleLetters($words) {
		$words.each(function(){
			var word = $(this),
				letters = word.text().split(''),
				selected = word.hasClass('is-visible');
			for (i in letters) {
				if(word.parents('.rotate-2').length > 0) letters[i] = '<em>' + letters[i] + '</em>';
				letters[i] = (selected) ? '<i class="in">' + letters[i] + '</i>': '<i>' + letters[i] + '</i>';
			}
		    var newLetters = letters.join('');
		    word.html(newLetters).css('opacity', 1);
		});
	}

	function animateHeadline($headlines) {
		var duration = animationDelay;
		$headlines.each(function(){
			var headline = $(this);
			
			if(headline.hasClass('loading-bar')) {
				duration = barAnimationDelay;
				setTimeout(function(){ headline.find('.cd-words-wrapper').addClass('is-loading') }, barWaiting);
			} else if (headline.hasClass('clip')){
				var spanWrapper = headline.find('.cd-words-wrapper'),
					newWidth = spanWrapper.width() + 10
				spanWrapper.css('width', newWidth);
			} else if (!headline.hasClass('type') ) {
				//assign to .cd-words-wrapper the width of its longest word
				var words = headline.find('.cd-words-wrapper b'),
					width = 0;
				words.each(function(){
					var wordWidth = $(this).width();
				    if (wordWidth > width){
                        width = wordWidth;
                        width = width;
                    }
				});
				headline.find('.cd-words-wrapper').css('width', width);
			};

			//trigger animation
			setTimeout(function(){ hideWord( headline.find('.is-visible').eq(0) ) }, duration);
		});
	}

	function hideWord($word) {
		var nextWord = takeNext($word);
		
		if($word.parents('.cd-headline').hasClass('type')) {
			var parentSpan = $word.parent('.cd-words-wrapper');
			parentSpan.addClass('selected').removeClass('waiting');	
			setTimeout(function(){ 
				parentSpan.removeClass('selected'); 
				$word.removeClass('is-visible').addClass('is-hidden').children('i').removeClass('in').addClass('out');
			}, selectionDuration);
			setTimeout(function(){ showWord(nextWord, typeLettersDelay) }, typeAnimationDelay);
		
		} else if($word.parents('.cd-headline').hasClass('letters')) {
			var bool = ($word.children('i').length >= nextWord.children('i').length) ? true : false;
			hideLetter($word.find('i').eq(0), $word, bool, lettersDelay);
			showLetter(nextWord.find('i').eq(0), nextWord, bool, lettersDelay);

		}  else if($word.parents('.cd-headline').hasClass('clip')) {
			$word.parents('.cd-words-wrapper').animate({ width : '2px' }, revealDuration, function(){
				switchWord($word, nextWord);
				showWord(nextWord);
			});

		} else if ($word.parents('.cd-headline').hasClass('loading-bar')){
			$word.parents('.cd-words-wrapper').removeClass('is-loading');
			switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, barAnimationDelay);
			setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('is-loading') }, barWaiting);

		} else {
			switchWord($word, nextWord);
			setTimeout(function(){ hideWord(nextWord) }, animationDelay);
		}
	}

	function showWord($word, $duration) {
		if($word.parents('.cd-headline').hasClass('type')) {
			showLetter($word.find('i').eq(0), $word, false, $duration);
			$word.addClass('is-visible').removeClass('is-hidden');

		}  else if($word.parents('.cd-headline').hasClass('clip')) {
			$word.parents('.cd-words-wrapper').animate({ 'width' : $word.width() + 10 }, revealDuration, function(){ 
				setTimeout(function(){ hideWord($word) }, revealAnimationDelay); 
			});
		}
	}

	function hideLetter($letter, $word, $bool, $duration) {
		$letter.removeClass('in').addClass('out');
		
		if(!$letter.is(':last-child')) {
		 	setTimeout(function(){ hideLetter($letter.next(), $word, $bool, $duration); }, $duration);  
		} else if($bool) { 
		 	setTimeout(function(){ hideWord(takeNext($word)) }, animationDelay);
		}

		if($letter.is(':last-child') && $('html').hasClass('no-csstransitions')) {
			var nextWord = takeNext($word);
			switchWord($word, nextWord);
		} 
	}

	function showLetter($letter, $word, $bool, $duration) {
		$letter.addClass('in').removeClass('out');
		
		if(!$letter.is(':last-child')) { 
			setTimeout(function(){ showLetter($letter.next(), $word, $bool, $duration); }, $duration); 
		} else { 
			if($word.parents('.cd-headline').hasClass('type')) { setTimeout(function(){ $word.parents('.cd-words-wrapper').addClass('waiting'); }, 200);}
			if(!$bool) { setTimeout(function(){ hideWord($word) }, animationDelay) }
		}
	}

	function takeNext($word) {
		return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
	}

	function takePrev($word) {
		return (!$word.is(':first-child')) ? $word.prev() : $word.parent().children().last();
	}

	function switchWord($oldWord, $newWord) {
		$oldWord.removeClass('is-visible').addClass('is-hidden');
		$newWord.removeClass('is-hidden').addClass('is-visible');
	}
});

// SmoothScroll v1.2.1
// Licensed under the terms of the MIT license.

// People involved
//  - Balazs Galambosi (maintainer)  
//  - Patrick Brunner  (original idea)
//  - Michael Herf     (Pulse Algorithm)
//  - Justin Force     (Resurect)

// Scroll Variables (tweakable)
var framerate = 150; // [Hz]
var animtime  = 800; // [px]
var stepsize  = 80; // [px]

// Pulse (less tweakable)
// ratio of "tail" to "acceleration"
var pulseAlgorithm = true;
var pulseScale     = 8;
var pulseNormalize = 1;

// Acceleration
var acceleration   = true;
var accelDelta     = 10;  // 20
var accelMax       = 1;   // 1

// Keyboard Settings
var keyboardsupport = true;  // option
var disableKeyboard = false; // other reasons
var arrowscroll     = 50;    // [px]

// Excluded pages
var exclude = "";
var disabled = false;

// Other Variables
var frame = false;
var direction = { x: 0, y: 0 };
var initdone  = false;
var fixedback = true;
var root = document.documentElement;
var activeElement;

var key = { left: 37, up: 38, right: 39, down: 40, spacebar: 32, pageup: 33, pagedown: 34, end: 35, home: 36 };

/**
 * Sets up scrolls array, determines if frames are involved.
 */
function init() {

  if (!document.body) return;

  var body = document.body;
  var html = document.documentElement;
  var windowHeight = window.innerHeight;
  var scrollHeight = body.scrollHeight;

  // check compat mode for root element
  root = (document.compatMode.indexOf('CSS') >= 0) ? html : body;
  activeElement = body;

  initdone = true;

  // Checks if this script is running in a frame
  if (top != self) {
    frame = true;
  }

  /**
   * This fixes a bug where the areas left and right to
   * the content does not trigger the onmousewheel event
   * on some pages. e.g.: html, body { height: 100% }
   */
  else if (scrollHeight > windowHeight &&
           (body.offsetHeight <= windowHeight ||
            html.offsetHeight <= windowHeight)) {

    // DOMChange (throttle): fix height
    var pending = false;
    var refresh = function() {
      if (!pending && html.scrollHeight != document.height) {
        pending = true; // add a new pending action
        setTimeout(function(){
          html.style.height = document.height + 'px';
          pending = false;
        }, 500); // act rarely to stay fast
      }
    };
    html.style.height = '';
    setTimeout(refresh, 10);
    addEvent("DOMNodeInserted", refresh);
    addEvent("DOMNodeRemoved",  refresh);

    // clearfix
    if (root.offsetHeight <= windowHeight) {
      var underlay = document.createElement("div");
      underlay.style.clear = "both";
      body.appendChild(underlay);
    }
  }

  // gmail performance fix
  if (document.URL.indexOf("mail.google.com") > -1) {
    var s = document.createElement("style");
    s.innerHTML = ".iu { visibility: hidden }";
    (document.getElementsByTagName("head")[0] || html).appendChild(s);
  }
  // disable fixed background
  if (!fixedback && !disabled) {
    body.style.backgroundAttachment = "scroll";
    html.style.backgroundAttachment = "scroll";
  }
}


/************************************************
 * SCROLLING
 ************************************************/

var que = [];
var pending = false;
var lastScroll = +new Date;

/**
 * Pushes scroll actions to the scrolling queue.
 */
function scrollArray(elem, left, top, delay) {

  delay || (delay = 1000);
  directionCheck(left, top);

  if (acceleration) {
    var now = +new Date;
    var elapsed = now - lastScroll;
    if (elapsed < accelDelta) {
      var factor = (1 + (30 / elapsed)) / 2;
      if (factor > 1) {
        factor = Math.min(factor, accelMax);
        left *= factor;
        top  *= factor;
      }
    }
    lastScroll = +new Date;
  }

  // push a scroll command
  que.push({
    x: left,
    y: top,
    lastX: (left < 0) ? 0.99 : -0.99,
    lastY: (top  < 0) ? 0.99 : -0.99,
    start: +new Date
  });

  // don't act if there's a pending queue
  if (pending) {
    return;
  }

  var scrollWindow = (elem === document.body);

  var step = function() {

    var now = +new Date;
    var scrollX = 0;
    var scrollY = 0;

    for (var i = 0; i < que.length; i++) {

      var item = que[i];
      var elapsed  = now - item.start;
      var finished = (elapsed >= animtime);

      // scroll position: [0, 1]
      var position = (finished) ? 1 : elapsed / animtime;

      // easing [optional]
      if (pulseAlgorithm) {
        position = pulse(position);
      }

      // only need the difference
      var x = (item.x * position - item.lastX) >> 0;
      var y = (item.y * position - item.lastY) >> 0;

      // add this to the total scrolling
      scrollX += x;
      scrollY += y;

      // update last values
      item.lastX += x;
      item.lastY += y;

      // delete and step back if it's over
      if (finished) {
        que.splice(i, 1); i--;
      }
    }

    // scroll left and top
    if (scrollWindow) {
      window.scrollBy(scrollX, scrollY)
    }
    else {
      if (scrollX) elem.scrollLeft += scrollX;
      if (scrollY) elem.scrollTop  += scrollY;
    }

    // clean up if there's nothing left to do
    if (!left && !top) {
      que = [];
    }

    if (que.length) {
      requestFrame(step, elem, (delay / framerate + 1));
    } else {
      pending = false;
    }
  }

  // start a new queue of actions
  requestFrame(step, elem, 0);
  pending = true;
}


/***********************************************
 * EVENTS
 ***********************************************/

/**
 * Mouse wheel handler.
 * @param {Object} event
 */
function wheel(event) {

  if (!initdone) {
    init();
  }

  var target = event.target;
  var overflowing = overflowingAncestor(target);

  // use default if there's no overflowing
  // element or default action is prevented
  if (!overflowing || event.defaultPrevented ||
      isNodeName(activeElement, "embed") ||
        (isNodeName(target, "embed") && /\.pdf/i.test(target.src))) {
    return true;
  }

  var deltaX = event.wheelDeltaX || 0;
  var deltaY = event.wheelDeltaY || 0;

  // use wheelDelta if deltaX/Y is not available
  if (!deltaX && !deltaY) {
    deltaY = event.wheelDelta || 0;
  }

  // scale by step size
  // delta is 120 most of the time
  // synaptics seems to send 1 sometimes
  if (Math.abs(deltaX) > 1.2) {
    deltaX *= stepsize / 120;
  }
  if (Math.abs(deltaY) > 1.2) {
    deltaY *= stepsize / 120;
  }

  scrollArray(overflowing, -deltaX, -deltaY);
  event.preventDefault();
}

/**
 * Keydown event handler.
 * @param {Object} event
 */
function keydown(event) {

  var target   = event.target;
  var modifier = event.ctrlKey || event.altKey || event.metaKey ||
    (event.shiftKey && event.keyCode !== key.spacebar);

  // do nothing if user is editing text
  // or using a modifier key (except shift)
  // or in a dropdown
  if ( /input|textarea|select|embed/i.test(target.nodeName) ||
      target.isContentEditable ||
        event.defaultPrevented   ||
          modifier ) {
    return true;
  }
  // spacebar should trigger button press
  if (isNodeName(target, "button") &&
      event.keyCode === key.spacebar) {
    return true;
  }

  var shift, x = 0, y = 0;
  var elem = overflowingAncestor(activeElement);
  var clientHeight = elem.clientHeight;

  if (elem == document.body) {
    clientHeight = window.innerHeight;
  }

  switch (event.keyCode) {
    case key.up:
      y = -arrowscroll;
    break;
    case key.down:
      y = arrowscroll;
    break;
    case key.spacebar: // (+ shift)
      shift = event.shiftKey ? 1 : -1;
    y = -shift * clientHeight * 0.9;
    break;
    case key.pageup:
      y = -clientHeight * 0.9;
    break;
    case key.pagedown:
      y = clientHeight * 0.9;
    break;
    case key.home:
      y = -elem.scrollTop;
    break;
    case key.end:
      var damt = elem.scrollHeight - elem.scrollTop - clientHeight;
    y = (damt > 0) ? damt+10 : 0;
    break;
    case key.left:
      x = -arrowscroll;
    break;
    case key.right:
      x = arrowscroll;
    break;
    default:
      return true; // a key we don't care about
  }

  scrollArray(elem, x, y);
  event.preventDefault();
}

/**
 * Mousedown event only for updating activeElement
 */
function mousedown(event) {
  activeElement = event.target;
}


/***********************************************
 * OVERFLOW
 ***********************************************/

var cache = {}; // cleared out every once in while
setInterval(function(){ cache = {}; }, 10 * 1000);

var uniqueID = (function() {
  var i = 0;
  return function (el) {
    return el.uniqueID || (el.uniqueID = i++);
  };
})();

function setCache(elems, overflowing) {
  for (var i = elems.length; i--;)
  cache[uniqueID(elems[i])] = overflowing;
  return overflowing;
}

function overflowingAncestor(el) {
  var elems = [];
  var rootScrollHeight = root.scrollHeight;
  do {
    var cached = cache[uniqueID(el)];
    if (cached) {
      return setCache(elems, cached);
    }
    elems.push(el);
    if (rootScrollHeight === el.scrollHeight) {
      if (!frame || root.clientHeight + 10 < rootScrollHeight) {
        return setCache(elems, document.body); // scrolling root in WebKit
      }
    } else if (el.clientHeight + 10 < el.scrollHeight) {
      overflow = getComputedStyle(el, "").getPropertyValue("overflow-y");
      if (overflow === "scroll" || overflow === "auto") {
        return setCache(elems, el);
      }
    }
  } while (el = el.parentNode);
}


/***********************************************
 * HELPERS
 ***********************************************/

function addEvent(type, fn, bubble) {
  window.addEventListener(type, fn, (bubble||false));
}

function removeEvent(type, fn, bubble) {
  window.removeEventListener(type, fn, (bubble||false));
}

function isNodeName(el, tag) {
  return (el.nodeName||"").toLowerCase() === tag.toLowerCase();
}

function directionCheck(x, y) {
  x = (x > 0) ? 1 : -1;
  y = (y > 0) ? 1 : -1;
  if (direction.x !== x || direction.y !== y) {
    direction.x = x;
    direction.y = y;
    que = [];
    lastScroll = 0;
  }
}

var requestFrame = (function(){
  return  window.requestAnimationFrame       ||
    window.webkitRequestAnimationFrame ||
    function(callback, element, delay){
    window.setTimeout(callback, delay || (1000/60));
  };
})();

/***********************************************
 * PULSE
 ***********************************************/

/**
 * Viscous fluid with a pulse for part and decay for the rest.
 * - Applies a fixed force over an interval (a damped acceleration), and
 * - Lets the exponential bleed away the velocity over a longer interval
 * - Michael Herf, http://stereopsis.com/stopping/
 */
function pulse_(x) {
  var val, start, expx;
  // test
  x = x * pulseScale;
  if (x < 1) { // acceleartion
    val = x - (1 - Math.exp(-x));
  } else {     // tail
    // the previous animation ended here:
    start = Math.exp(-1);
    // simple viscous drag
    x -= 1;
    expx = 1 - Math.exp(-x);
    val = start + (expx * (1 - start));
  }
  return val * pulseNormalize;
}

function pulse(x) {
  if (x >= 1) return 1;
  if (x <= 0) return 0;

  if (pulseNormalize == 1) {
    pulseNormalize /= pulse_(1);
  }
  return pulse_(x);
}

addEvent("mousedown", mousedown);
addEvent("mousewheel", wheel);
addEvent("load", init);

/**
 * jquery.hoverdir.js v1.1.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2012, Codrops
 * http://www.codrops.com
 */
;( function( $, window, undefined ) {
	
	'use strict';

	$.HoverDir = function( options, element ) {
		
		this.$el = $( element );
		this._init( options );

	};

	// the options
	$.HoverDir.defaults = {
		speed : 300,
		easing : 'ease',
		hoverDelay : 0,
		inverse : false
	};

	$.HoverDir.prototype = {

		_init : function( options ) {
			
			// options
			this.options = $.extend( true, {}, $.HoverDir.defaults, options );
			// transition properties
			this.transitionProp = 'all ' + this.options.speed + 'ms ' + this.options.easing;
			// support for CSS transitions
			this.support = Modernizr.csstransitions;
			// load the events
			this._loadEvents();

		},
		_loadEvents : function() {

			var self = this;
			
			this.$el.on( 'mouseenter.hoverdir, mouseleave.hoverdir', function( event ) {
				
				var $el = $( this ),
					$hoverElem = $el.find( 'div' ),
					direction = self._getDir( $el, { x : event.pageX, y : event.pageY } ),
					styleCSS = self._getStyle( direction );
				
				if( event.type === 'mouseenter' ) {
					
					$hoverElem.hide().css( styleCSS.from );
					clearTimeout( self.tmhover );

					self.tmhover = setTimeout( function() {
						
						$hoverElem.show( 0, function() {
							
							var $el = $( this );
							if( self.support ) {
								$el.css( 'transition', self.transitionProp );
							}
							self._applyAnimation( $el, styleCSS.to, self.options.speed );

						} );
						
					
					}, self.options.hoverDelay );
					
				}
				else {
				
					if( self.support ) {
						$hoverElem.css( 'transition', self.transitionProp );
					}
					clearTimeout( self.tmhover );
					self._applyAnimation( $hoverElem, styleCSS.from, self.options.speed );
					
				}
					
			} );

		},
		// credits : http://stackoverflow.com/a/3647634
		_getDir : function( $el, coordinates ) {
			
			// the width and height of the current div
			var w = $el.width(),
				h = $el.height(),

				// calculate the x and y to get an angle to the center of the div from that x and y.
				// gets the x value relative to the center of the DIV and "normalize" it
				x = ( coordinates.x - $el.offset().left - ( w/2 )) * ( w > h ? ( h/w ) : 1 ),
				y = ( coordinates.y - $el.offset().top  - ( h/2 )) * ( h > w ? ( w/h ) : 1 ),
			
				// the angle and the direction from where the mouse came in/went out clockwise (TRBL=0123);
				// first calculate the angle of the point,
				// add 180 deg to get rid of the negative values
				// divide by 90 to get the quadrant
				// add 3 and do a modulo by 4  to shift the quadrants to a proper clockwise TRBL (top/right/bottom/left) **/
				direction = Math.round( ( ( ( Math.atan2(y, x) * (180 / Math.PI) ) + 180 ) / 90 ) + 3 ) % 4;
			
			return direction;
			
		},
		_getStyle : function( direction ) {
			
			var fromStyle, toStyle,
				slideFromTop = { left : '0px', top : '-100%' },
				slideFromBottom = { left : '0px', top : '100%' },
				slideFromLeft = { left : '-100%', top : '0px' },
				slideFromRight = { left : '100%', top : '0px' },
				slideTop = { top : '0px' },
				slideLeft = { left : '0px' };
			
			switch( direction ) {
				case 0:
					// from top
					fromStyle = !this.options.inverse ? slideFromTop : slideFromBottom;
					toStyle = slideTop;
					break;
				case 1:
					// from right
					fromStyle = !this.options.inverse ? slideFromRight : slideFromLeft;
					toStyle = slideLeft;
					break;
				case 2:
					// from bottom
					fromStyle = !this.options.inverse ? slideFromBottom : slideFromTop;
					toStyle = slideTop;
					break;
				case 3:
					// from left
					fromStyle = !this.options.inverse ? slideFromLeft : slideFromRight;
					toStyle = slideLeft;
					break;
			};
			
			return { from : fromStyle, to : toStyle };
					
		},
		// apply a transition or fallback to jquery animate based on Modernizr.csstransitions support
		_applyAnimation : function( el, styleCSS, speed ) {

			$.fn.applyStyle = this.support ? $.fn.css : $.fn.animate;
			el.stop().applyStyle( styleCSS, $.extend( true, [], { duration : speed + 'ms' } ) );

		},

	};
	
	var logError = function( message ) {

		if ( window.console ) {

			window.console.error( message );
		
		}

	};
	
	$.fn.hoverdir = function( options ) {

		var instance = $.data( this, 'hoverdir' );
		
		if ( typeof options === 'string' ) {
			
			var args = Array.prototype.slice.call( arguments, 1 );
			
			this.each(function() {
			
				if ( !instance ) {

					logError( "cannot call methods on hoverdir prior to initialization; " +
					"attempted to call method '" + options + "'" );
					return;
				
				}
				
				if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {

					logError( "no such method '" + options + "' for hoverdir instance" );
					return;
				
				}
				
				instance[ options ].apply( instance, args );
			
			});
		
		} 
		else {
		
			this.each(function() {
				
				if ( instance ) {

					instance._init();
				
				}
				else {

					instance = $.data( this, 'hoverdir', new $.HoverDir( options, this ) );
				
				}

			});
		
		}
		
		return instance;
		
	};
	
} )( jQuery, window );
