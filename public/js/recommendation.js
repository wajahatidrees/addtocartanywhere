$(document).ready(function() {
    $('.banner_slider').slick({
        fade: true, cssEase: 'linear', arrows: true, autoplay: true, autoplaySpeed: 2000, infinite: false
    });
    $(".prev-arrow").click(function () {
        $(".banner_slider").slick("slickPrev");
    });
    $(".next-arrow").click(function () {
        $(".banner_slider").slick("slickNext");
    });
    $(".prev-arrow").addClass("slick-disabled");
    $(".banner_slider").on("afterChange", function () {
        if ($(".slick-prev").hasClass("slick-disabled")) {
            $(".prev-arrow").addClass("slick-disabled");
        } else {
            $(".prev-arrow").removeClass("slick-disabled");
        }
        if ($(".slick-next").hasClass("slick-disabled")) {
            $(".next-arrow").addClass("slick-disabled");
        } else {
            $(".next-arrow").removeClass("slick-disabled");
        }
    });
});
