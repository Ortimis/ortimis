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
    }

}

export default Carousel;
