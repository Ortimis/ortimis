class Carousel {

    constructor() {
        this.init();
    }

    init() {
        $( '.fade-carousel' ).slick({
          infinite: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          arrows: false,
          autoplay: true,
          autoplaySpeed: 3000,
          draggable: false,
          swipe: false,
          swipeToSlide: false,
        });

        $( '.blog-carousel' ).slick({
          infinite: false,
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: false,
          arrows: true,
          autoplay: false,
          draggable: true,
          swipe: true,
          swipeToSlide: true,
          responsive: [
            {
              breakpoint: 560,
              settings: {
                slidesToShow: 1,
              }
            }
          ]
        });

        $( '.kunden-carousel' ).slick({
          infinite: false,
          slidesToShow: 2,
          slidesToScroll: 1,
          dots: false,
          arrows: true,
          autoplay: false,
          draggable: true,
          swipe: true,
          swipeToSlide: true,
          responsive: [
            {
              breakpoint: 560,
              settings: {
                slidesToShow: 1,
              }
            }
          ]
        });
    }

}

export default Carousel;
