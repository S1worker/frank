/**
 * AllPage
 * @type {{init: AllPage.init}}
 */
const AllPage = function () {

    /**
     * Plugin
     */
    const pluginStart = function () {

        /**
         * Replace all SVG images with inline SVG
         */
		jQuery('img.svg').each(function(){
			var $img = jQuery(this);
			var imgID = $img.attr('id');
			var imgClass = $img.attr('class');
			var imgURL = $img.attr('src');

			jQuery.get(imgURL, function(data) {
				// Get the SVG tag, ignore the rest
				var $svg = jQuery(data).find('svg');

				// Add replaced image ID to the new SVG
				if(typeof imgID !== 'undefined') {
					$svg = $svg.attr('id', imgID);
				}
				// Add replaced image classes to the new SVG
				if(typeof imgClass !== 'undefined') {
					$svg = $svg.attr('class', imgClass+' replaced-svg');
				}

				// Remove any invalid XML tags as per http://validator.w3.org
				$svg = $svg.removeAttr('xmlns:a');

				// Check if the viewport is set, if the viewport is not set the SVG wont't scale.
				if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
					$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
				}

				// Replace image with new SVG
				$img.replaceWith($svg);

			}, 'xml');

		});

	}

    /**
     * Header
     */
    const Header = function () {

        /**
         * Navbar Menu
         */
        $(document).on('click', '.header__btnmenu', function(e) {
            e.preventDefault();

            $('body').toggleClass('menu__active');

        });

    }

    /**
     * Init
     */
	return {
		init: function () {
			pluginStart();
            Header();
		}
	};

}();

/**
 * AllPage
 * @type {{init: AllPage.init}}
 */
const HomePage = function () {

    /**
     * Slider
     * @constructor
     */
    const Slider = function () {

        /**
         * Swiper
         * @type {Swiper}
         */

        const swiper = new Swiper('.intro__slider .swiper-container', {
            loop            : true,
            slidesPerView   : 1,
            spaceBetween    : 30,
            autoplay        : {
                delay       : 5000,
            },
            pagination: {
                el          : '.intro__slider .swiper-pagination',
                clickable   : true,
            },
        });

    }

    /**
     * Gallery
     * @constructor
     */
    const Gallery = function () {

        /**
         * Swiper
         * @type {Swiper}
         */
        const swiper = new Swiper('.gallery__slider .swiper-container', {
            loop            : true,
            slidesPerView   : 'auto',
            spaceBetween    : 14,
            autoplay        : {
                delay       : 5000,
            },
            pagination: {
                el          : '.gallery__slider .swiper-pagination',
                clickable   : true,
            },
            navigation: {
                nextEl      : '.gallery__slider .swiper-button-next',
                prevEl      : '.gallery__slider .swiper-button-prev',
            },
        });
    }


    /**
     * Init
     */
    return {
        init: function () {
            Slider();
            Gallery();
        }
    };

}();

/**
 * ready
 */
jQuery(document).ready(function() {
	AllPage.init();
    HomePage.init();
});



