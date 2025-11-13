$(document).ready(function() {
    $('.recommendation_banner_slider').slick({
        fade: true, cssEase: 'linear', arrows: false, autoplay: true, autoplaySpeed: 3000, infinite: false
    });
    $(".prev-arrow").click(function () {
        $(".recommendation_banner_slider").slick("slickPrev");
    });
    $(".next-arrow").click(function () {
        $(".recommendation_banner_slider").slick("slickNext");
    });
    updateArrowState();

    $('.recommendation_banner_slider').on("afterChange", function () {
        updateArrowState();
    });

    function updateArrowState() {
        let currentSlide = $(".recommendation_banner_slider").slick('slickCurrentSlide');
        let totalSlides = $(".recommendation_banner_slider").slick('getSlick').slideCount;

        if (currentSlide === 0) {
            $(".prev-arrow").addClass("slick-disabled");
        } else {
            $(".prev-arrow").removeClass("slick-disabled");
        }
        if (currentSlide === totalSlides - 1) {
            $(".next-arrow").addClass("slick-disabled");
        } else {
            $(".next-arrow").removeClass("slick-disabled");
        }
    }
});
